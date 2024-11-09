<?php

use Dotenv\Dotenv;
use Twilio\Rest\Client;
use GuzzleHttp\Exception\RequestException;

require 'vendor/autoload.php';
#require 'gemini.php';

$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

function listenToWhatsAppReplies($request)
{
    $from = $request['From'];
    $body = escapeshellarg($request['Body']); // Escape the prompt for safe command-line usage
    $mediaUrl = isset($request['MediaUrl0']) ? $request['MediaUrl0'] : null;
    $mimeType = isset($request['MediaContentType0']) ? $request['MediaContentType0'] : null;

    try {
        if ($mediaUrl) {
            $message = generateContentFromGemini($body, $mediaUrl, $mimeType);
            sendWhatsAppMessage($message, $from);
        } else {
            $message = generateContentFromGemini($body);
            sendWhatsAppMessage($message, $from);
        }
    } catch (RequestException $e) {
        sendWhatsAppMessage($e->getMessage(), $from);
    }
}

function sendWhatsAppMessage($message, $recipient)
{
    $twilio_whatsapp_number = getenv('TWILIO_WHATSAPP_NUMBER');
    $account_sid = getenv("TWILIO_SID");
    $auth_token = getenv("TWILIO_AUTH_TOKEN");

    $client = new Client($account_sid, $auth_token);

    // Split message into chunks of 1600 characters
    $messageChunks = str_split($message, 1500);
    $result = [];

    foreach ($messageChunks as $index => $chunk) {
        // Optional: Add part indicator for clarity if message is split
        $chunk .= " (" . ($index + 1) . "/" . count($messageChunks) . ")";

        // Send each chunk
        $result[] = $client->messages->create("$recipient", [
            'from' => "whatsapp:$twilio_whatsapp_number",
            'body' => $chunk
        ]);
    }

    return $result; // Return an array of message send results
}

function generateContentFromGemini($prompt, $fileUri = null, $mimeType = null)
{
    // Execute response.py with the prompt as an argument
    $command = "python3 response.py $prompt";
    shell_exec($command);

    // Read the generated content from output.txt
    $output = file_get_contents("output.txt");

    if ($output === false) {
        return "Failed to retrieve response from Python script.";
    }

    return $output;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request = $_POST;
    listenToWhatsAppReplies($request);
    http_response_code(200);
    echo 'Message processed';
} else {
    http_response_code(405);
    echo 'Method not allowed';
}
