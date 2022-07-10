<?php

namespace Mailchimp\Api\Campaigns;

use Mailchimp\Api\BaseApi;
use Mailchimp\HttpMethod;

/**
 * Post comments, reply to team feedback, and send test emails while you're working together on a Mailchimp campaign.
 */
class Feedback extends BaseApi
{
    /**
     * List campaign feedback
     *
     * Get team feedback while you're working together on a Mailchimp campaign.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     */
    public function getAll(
        string $campaignId,
        ?array $fields=null,
        ?array $exclude_fields=null
    ): array {
        return $this->mailchimp->call(
            "campaigns/$campaignId/feedback",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Get campaign feedback message
     *
     * Get a specific feedback message from a campaign.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @param string $feedbackId
     * The unique id for the feedback message.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function getById(
        string $campaignId,
        string $feedbackId,
        ?array $fields=null,
        ?array $exclude_fields=null
    ): array {
        return $this->mailchimp->call(
            "campaigns/$campaignId/feedback/$feedbackId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Add campaign feedback
     *
     * Add feedback on a specific campaign.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @param string $message
     * The content of the feedback.
     * @param int|null $block_id
     * The block id for the editable block that the feedback addresses.
     * @param bool|null $is_complete
     * The status of feedback.
     * @return array
     */
    public function add(string $campaignId, string $message, ?int $block_id=null, ?bool $is_complete=null): array
    {
        return $this->mailchimp->call(
            "campaigns/$campaignId/feedback",
            null,
            $this->toArray(get_defined_vars(), ['campaignId']),
            HttpMethod::POST
        );
    }

    /**
     * Update campaign feedback message
     *
     * Update a specific feedback message for a campaign.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @param string $feedbackId
     * The unique id for the feedback message.
     * @param string|null $message
     * The content of the feedback.
     * @param int|null $block_id
     * The block id for the editable block that the feedback addresses.
     * @param bool|null $is_complete
     * The status of feedback.
     * @return array
     */
    public function update(
        string $campaignId,
        string $feedbackId,
        ?string $message=null,
        ?int $block_id=null,
        ?bool $is_complete=null
    ): array {
        return $this->mailchimp->call(
            "campaigns/$campaignId/feedback/$feedbackId",
            null,
            $this->toArray(get_defined_vars(), ['campaignId', 'feedbackId']),
            HttpMethod::PATCH
        );
    }

    /**
     * Delete campaign feedback message
     *
     * Remove a specific feedback message for a campaign.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @param string $feedbackId
     * The unique id for the feedback message.
     * @return array
     */
    public function delete(string $campaignId, string $feedbackId): array
    {
        return $this->mailchimp->call(
            "campaigns/$campaignId/feedback/$feedbackId",
            null,
            null,
            HttpMethod::DELETE
        );
    }
}
