<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Assistants
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Assistants\V1\Session;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;
use Twilio\Deserialize;


/**
 * @property string $id
 * @property string $accountSid
 * @property string $assistantId
 * @property string $sessionId
 * @property string $identity
 * @property string $role
 * @property array $content
 * @property array $meta
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 */
class MessageInstance extends InstanceResource
{
    /**
     * Initialize the MessageInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sessionId Session id or name
     */
    public function __construct(Version $version, array $payload, string $sessionId)
    {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'id' => Values::array_get($payload, 'id'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'assistantId' => Values::array_get($payload, 'assistant_id'),
            'sessionId' => Values::array_get($payload, 'session_id'),
            'identity' => Values::array_get($payload, 'identity'),
            'role' => Values::array_get($payload, 'role'),
            'content' => Values::array_get($payload, 'content'),
            'meta' => Values::array_get($payload, 'meta'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
        ];

        $this->solution = ['sessionId' => $sessionId, ];
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name)
    {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.Assistants.V1.MessageInstance]';
    }
}
