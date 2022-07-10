<?php

namespace Mailchimp\Api\Campaigns;

use Mailchimp\Api\BaseApi;

/**
 * Review the send checklist for your campaign, and resolve any issues before sending.
 */
class SendChecklist extends BaseApi
{
    /**
     * Get campaign send checklist
     *
     * Review the send checklist for a campaign, and resolve any issues before sending.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     */
    public function get(
        string $campaignId,
        ?array $fields=null,
        ?array $exclude_fields=null
    ): array {
        return $this->mailchimp->call(
            "campaigns/$campaignId/send-checklist",
            compact('fields', 'exclude_fields')
        );
    }
}
