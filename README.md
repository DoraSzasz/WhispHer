# WhispHer

WhispHer is a Gemini-powered chatbot accessible through WhatsApp. It provides a confidential, judgment-free space for young women to ask questions and receive accurate, scientifically backed answers about sexual health, menstrual care, and overall well-being. Users can simply text a number on WhatsApp to connect with WhispHer. By offering reliable information anonymously, WhispHer is designed to break through cultural taboos that have long kept girls in the dark.

### Why WhatsApp?

Our choice of WhatsApp as the primary platform leverages its unparalleled market penetration in Sub-Saharan Africa, where it reaches 97% of internet users in Kenya and represents 44% of Zimbabwe's mobile internet traffic. This established user base ensures minimal adoption barriers in our target markets. Beyond its extensive reach, WhatsApp offers technical advantages: it performs reliably in low-bandwidth areas, consumes minimal data (making it more cost-effective than alternatives like Google search), and requires no additional app downloads.

In the near future, we plan to collaborate with local nonprofits in Sub-Saharan Africa to measure WhispHer's impact on girls' education and health outcomes.

## How We Built It

### Step 1: Configure Gemini-1.5 Model to Act as an OB-GYN Assistant

WhispHer uses the **Gemini-1.5-flash-002** model through Google’s Vertex AI to provide a friendly OB-GYN assistant for women’s reproductive and sexual health support. Key configuration steps include:

- **Model Selection**: We chose Gemini-1.5-flash-002 for its high-quality, contextual responses, eliminating the need for additional fine-tuning.
- **Prompt Configuration**: Specific prompts were used to achieve goals such as:
  - Providing scientifically accurate and culturally sensitive responses.
  - Avoiding specific medical diagnoses and advice.
  - Creating a safe, non-judgmental space for user queries.
  - Reflecting a deep understanding of women’s health within conservative societies.
- **Custom Instructions**: Instructions ensure the model uses simple language, avoids jargon, and empowers users by linking to relevant information and resources.

### Step 2: Integrate the Gemini Model with WhatsApp Using Twilio and NGROK

To connect WhispHer with WhatsApp, we leveraged **Twilio** for messaging and **NGROK** to expose our local server, allowing for external access. Here’s how:

- **Set Up NGROK**: NGROK provided a public endpoint for our local server, making it accessible to WhatsApp and Twilio’s API.
- **Twilio Configuration**: Using Twilio’s sandbox, we configured a `.env` file to securely store:
  - Twilio Account SID and Auth Token.
  - WhatsApp number for messaging.
  - Google Cloud project and Vertex AI authentication details.
- **Bot Script**:
  - `bot.php` listens for incoming messages and directs them to `response.py`.
  - `sendWhatsAppMessage()` sends responses back to WhatsApp, chunking messages when necessary.
  - `generateContentFromGemini()` invokes the Python script, which processes the prompt, generates a response, and sends it back via WhatsApp.

### Step 3: Handle Message Responses Using Vertex AI in Python

The `response.py` Python script manages the core logic for generating responses:

- **Define Prompt and Response Settings**: The script initializes Vertex AI and loads the Gemini model with the OB-GYN assistant prompt, applying safety settings to ensure responses are culturally sensitive.
- **Generate Responses**: `multiturn_generate_content()` processes user input, generates a response, and writes it to an output file.
- **Run and Return**: The PHP script reads the response from the output file and sends it back to the user via Twilio’s WhatsApp API.

This setup enables WhispHer to interact seamlessly on WhatsApp, providing users with general health information while maintaining privacy, sensitivity, and cultural respect.
