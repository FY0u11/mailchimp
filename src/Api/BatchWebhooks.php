<?php

namespace Mailchimp\Api;

use Mailchimp\Api\BatchOperations\Operations;
use Mailchimp\HttpMethod;

/**
 * Manage webhooks for batch operations.
 */
class BatchWebhooks extends BaseApi
{
    /**
     * List batch webhooks
     *
     * Get all webhooks that have been configured for batches.
     *
     * @param array|null $fields         A comma-separated list of fields to return. Reference parameters of
     *                                   sub-objects with dot notation.
     * @param array|null $exclude_fields A comma-separated list of fields to exclude. Reference parameters of
     *                                   sub-objects with dot notation.
     * @param int|null $count            The number of records to return. Default value is 10. Maximum value is 1000.
     * @param int|null $offset           Used for pagination, this is the number of records from a collection to skip.
     *                                   Default value is 0.
     * @return array
     */
    public function getAll(
        ?array $fields=null,
        ?array $exclude_fields=null,
        ?int $count=null,
        ?int $offset=null
    ): array {
        return $this->mailchimp->call(
            'batch-webhooks',
            get_defined_vars()
        );
    }

    /**
     * Get batch webhook info
     *
     * Get information about a specific batch webhook.
     *
     * @param string $batchWebhookId     The unique id for the batch webhook.
     * @param array|null $fields         A comma-separated list of fields to return. Reference parameters of
     *                                   sub-objects with dot notation.
     * @param array|null $exclude_fields A comma-separated list of fields to exclude. Reference parameters of
     *                                   sub-objects with dot notation.
     * @return array
     */
    public function getById(string $batchWebhookId, ?array $fields=null, ?array $exclude_fields=null): array
    {
        return $this->mailchimp->call(
            "batch-webhooks/$batchWebhookId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Add batch webhook
     *
     * Configure a webhook that will fire whenever any batch request completes processing. You may only have a maximum
     * of 20 batch webhooks.
     *
     * @param string $url A valid URL for the Webhook.
     * @return array
     */
    public function add(string $url): array
    {
        return $this->mailchimp->call(
            'batch-webhooks',
            null,
            get_defined_vars(),
            HttpMethod::POST
        );
    }

    /**
     * Update batch webhook
     *
     * Update a webhook that will fire whenever any batch request completes processing.
     *
     * @param string $batchWebhookId The unique id for the batch webhook.
     * @param string $url            A valid URL for the Webhook.
     * @return array
     */
    public function update(string $batchWebhookId, string $url): array
    {
        return $this->mailchimp->call(
            "batch-webhooks/$batchWebhookId",
            null,
            compact('url'),
            HttpMethod::PATCH
        );
    }

    /**
     * Delete batch webhook
     *
     * Remove a batch webhook. Webhooks will no longer be sent to the given URL.
     *
     * @param string $batchWebhookId The unique id for the batch webhook.
     * @return array
     */
    public function delete(string $batchWebhookId): array
    {
        return $this->mailchimp->call(
            "batch-webhooks/$batchWebhookId",
            null,
            null,
            HttpMethod::DELETE
        );
    }
}
