<?php
/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Video
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Video\V1\Room;

use Twilio\Options;
use Twilio\Values;

abstract class RoomRecordingOptions
{


    /**
     * @param string $status Read only the recordings with this status. Can be: `processing`, `completed`, or `deleted`.
     * @param string $sourceSid Read only the recordings that have this `source_sid`.
     * @param \DateTime $dateCreatedAfter Read only recordings that started on or after this [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) datetime with time zone.
     * @param \DateTime $dateCreatedBefore Read only Recordings that started before this [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) datetime with time zone.
     * @return ReadRoomRecordingOptions Options builder
     */
    public static function read(
        
        string $status = Values::NONE,
        string $sourceSid = Values::NONE,
        \DateTime $dateCreatedAfter = null,
        \DateTime $dateCreatedBefore = null

    ): ReadRoomRecordingOptions
    {
        return new ReadRoomRecordingOptions(
            $status,
            $sourceSid,
            $dateCreatedAfter,
            $dateCreatedBefore
        );
    }

}



class ReadRoomRecordingOptions extends Options
    {
    /**
     * @param string $status Read only the recordings with this status. Can be: `processing`, `completed`, or `deleted`.
     * @param string $sourceSid Read only the recordings that have this `source_sid`.
     * @param \DateTime $dateCreatedAfter Read only recordings that started on or after this [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) datetime with time zone.
     * @param \DateTime $dateCreatedBefore Read only Recordings that started before this [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) datetime with time zone.
     */
    public function __construct(
        
        string $status = Values::NONE,
        string $sourceSid = Values::NONE,
        \DateTime $dateCreatedAfter = null,
        \DateTime $dateCreatedBefore = null

    ) {
        $this->options['status'] = $status;
        $this->options['sourceSid'] = $sourceSid;
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
    }

    /**
     * Read only the recordings with this status. Can be: `processing`, `completed`, or `deleted`.
     *
     * @param string $status Read only the recordings with this status. Can be: `processing`, `completed`, or `deleted`.
     * @return $this Fluent Builder
     */
    public function setStatus(string $status): self
    {
        $this->options['status'] = $status;
        return $this;
    }

    /**
     * Read only the recordings that have this `source_sid`.
     *
     * @param string $sourceSid Read only the recordings that have this `source_sid`.
     * @return $this Fluent Builder
     */
    public function setSourceSid(string $sourceSid): self
    {
        $this->options['sourceSid'] = $sourceSid;
        return $this;
    }

    /**
     * Read only recordings that started on or after this [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) datetime with time zone.
     *
     * @param \DateTime $dateCreatedAfter Read only recordings that started on or after this [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) datetime with time zone.
     * @return $this Fluent Builder
     */
    public function setDateCreatedAfter(\DateTime $dateCreatedAfter): self
    {
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
        return $this;
    }

    /**
     * Read only Recordings that started before this [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) datetime with time zone.
     *
     * @param \DateTime $dateCreatedBefore Read only Recordings that started before this [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) datetime with time zone.
     * @return $this Fluent Builder
     */
    public function setDateCreatedBefore(\DateTime $dateCreatedBefore): self
    {
        $this->options['dateCreatedBefore'] = $dateCreatedBefore;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Video.V1.ReadRoomRecordingOptions ' . $options . ']';
    }
}
