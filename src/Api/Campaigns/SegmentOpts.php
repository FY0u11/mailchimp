<?php

namespace Mailchimp\Api\Campaigns;

use Mailchimp\Api\BaseObject;

/**
 * An object representing all segmentation options. This object should contain a saved_segment_id to use an existing
 * segment, or you can create a new segment by including both match and conditions options.
 */
class SegmentOpts extends BaseObject implements SegmentOptsInterface
{
    /**
     * @var int|null
     * The id for an existing saved segment.
     */
    public ?int $saved_segment_id;

    /**
     * @var string|null
     * Segment match type. Possible values: "any" or "all".
     */
    public ?string $match;

    /**
     * @var array|null
     * Segment match conditions. There are multiple possible types, see https://mailchimp.com/developer/marketing/docs/alternative-schemas/#segment-condition-schemas
     */
    public ?array $conditions;

    /**
     * @var string|null
     * The prebuilt segment id, if a prebuilt segment has been designated for this campaign.
     */
    public ?string $prebuilt_segment_id;

    /**
     * An object representing all segmentation options. This object should contain a saved_segment_id to use an existing
     * segment, or you can create a new segment by including both match and conditions options.
     *
     * @param int|null $saved_segment_id
     * The id for an existing saved segment.
     * @param string|null $match
     * Segment match type. Possible values: "any" or "all".
     * @param array|null $conditions
     * Segment match conditions. There are multiple possible types, see https://mailchimp.com/developer/marketing/docs/alternative-schemas/#segment-condition-schemas
     * @param string|null $prebuilt_segment_id
     * The prebuilt segment id, if a prebuilt segment has been designated for this campaign.
     */
    public function __construct(
        ?int $saved_segment_id=null,
        ?string $match=null,
        ?array $conditions=null,
        ?string $prebuilt_segment_id=null
    ) {
        $this->saved_segment_id = $saved_segment_id;
        $this->match = $match;
        $this->conditions = $conditions;
        $this->prebuilt_segment_id = $prebuilt_segment_id;
    }
}
