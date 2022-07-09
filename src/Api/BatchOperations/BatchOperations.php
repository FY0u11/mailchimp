<?php

namespace Mailchimp\Api\BatchOperations;

use Mailchimp\Api\BaseApi;
use Mailchimp\HttpMethod;

/**
 * Use batch operations to complete multiple operations with a single call.
 */
class BatchOperations extends BaseApi
{
    /**
     * List batch requests
     *
     * Get a summary of batch requests that have been made.
     *
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @param int|null $count
     * The number of records to return. Default value is 10. Maximum value is 1000.
     * @param int|null $offset
     * Used for pagination, this is the number of records from a collection to skip. Default value is 0.
     * @return array
     */
    public function getAll(
        ?array $fields=null,
        ?array $exclude_fields=null,
        ?int $count=null,
        ?int $offset=null
    ): array {
        return $this->mailchimp->call(
            'batches',
            get_defined_vars()
        );
    }

    /**
     * Get batch operation status
     *
     * Get the status of a batch request.
     *
     * @param string $batchId
     * The unique id for the batch operation.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function getById(string $batchId, ?array $fields=null, ?array $exclude_fields=null): array
    {
        return $this->mailchimp->call(
            "batches/$batchId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Start batch operation
     *
     * Begin processing a batch operations request.
     *
     * @param Operations $operations
     * An array of objects that describes operations to perform.
     * @return array
     */
    public function add(Operations $operations): array
    {
        return $this->mailchimp->call(
            'batches',
            null,
            $this->parseObjectsToArray(get_defined_vars()),
            HttpMethod::POST
        );
    }

    /**
     * Delete batch request
     *
     * Stops a batch request from running. Since only one batch request is run at a time, this can be used to cancel a
     * long-running request. The results of any completed operations will not be available after this call.
     *
     * @param string $batchId
     * The unique id for the batch operation.
     * @return array
     */
    public function delete(string $batchId): array
    {
        return $this->mailchimp->call(
            "batches/$batchId",
            null,
            null,
            HttpMethod::DELETE
        );
    }
}
