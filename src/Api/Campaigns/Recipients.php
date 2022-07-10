<?php

namespace Mailchimp\Api\Campaigns;

use Mailchimp\Api\BaseObject;

/**
 * List settings for the campaign.
 */
class Recipients extends BaseObject
{
    /**
     * @var string|null
     * The unique list id.
     */
    public ?string $list_id;

    /**
     * @var SegmentOpts|null
     * An object representing all segmentation options. This object should contain a saved_segment_id to use an existing
     * segment, or you can create a new segment by including both match and conditions options.
     */
    public ?SegmentOpts $segment_opts;

    /**
     * List settings for the campaign.
     *
     * @param string|null $list_id
     * The unique list id.
     * @param SegmentOpts|null $segment_opts
     * An object representing all segmentation options. This object should contain a saved_segment_id to use an existing
     * segment, or you can create a new segment by including both match and conditions options.
     */
    public function __construct(?string $list_id=null, ?SegmentOpts $segment_opts=null)
    {
        $this->list_id = $list_id;
        $this->segment_opts = $segment_opts;
    }
}
