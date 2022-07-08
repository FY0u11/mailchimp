<?php

namespace Mailchimp\Api;

use Mailchimp\HttpMethod;

/**
 * Generate a new export or download a finished export.
 */
class AccountExports extends AbstractApi
{
    /**
     * Get a list of account exports for a given account.
     *
     * @param array|null $fields
     * @param array|null $exclude_fields
     * @param int|null $count
     * @param int|null $offset
     * @return array
     */
    public function getAll(
        ?array $fields=null,
        ?array $exclude_fields=null,
        ?int $count=null,
        ?int $offset=null
    ): array {
        return $this->mailchimp->call(
            'account-exports',
            compact('fields', 'exclude_fields', 'count', 'offset')
        );
    }

    /**
     * Get information about a specific account export.
     *
     * @param string $exportId
     * @param array|null $fields
     * @param array|null $exclude_fields
     * @return array
     */
    public function getById(string $exportId, ?array $fields=null, ?array $exclude_fields=null): array
    {
        return $this->mailchimp->call(
            "account-exports/$exportId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Create a new account export in your Mailchimp account.
     *
     * @param array $include_stages
     * @param string|null $since_timestamp
     * @return array
     */
    public function add(array $include_stages, ?string $since_timestamp = null): array
    {
        return $this->mailchimp->call(
            'account-exports',
            null,
            compact('include_stages', 'since_timestamp'),
            HttpMethod::POST
        );
    }
}
