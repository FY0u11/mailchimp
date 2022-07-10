<?php

namespace Mailchimp\Api\Campaigns;

use Mailchimp\Api\BaseObject;

/**
 * Choose whether the campaign should use Batch Delivery. Cannot be set to true for campaigns using Timewarp.
 */
class BatchDelivery extends BaseObject
{
    /**
     * @var int|null
     * The delay, in minutes, between batches.
     */
    public ?int $batch_delay;

    /**
     * @var int|null
     * The number of batches for the campaign send.
     */
    public ?int $batch_count;

    /**
     * Choose whether the campaign should use Batch Delivery. Cannot be set to true for campaigns using Timewarp.
     *
     * @param int|null $batch_delay
     * The delay, in minutes, between batches.
     * @param int|null $batch_count
     * The number of batches for the campaign send.
     */
    public function __construct(?int $batch_delay=null, ?int $batch_count=null)
    {
        $this->batch_delay = $batch_delay;
        $this->batch_count = $batch_count;
    }
}
