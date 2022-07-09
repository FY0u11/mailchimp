<?php

namespace Mailchimp\Api;

use Mailchimp\HttpMethod;

/**
 * Generate a new export or download a finished export.
 */
class AccountExports extends BaseApi
{
    /**
     * Get a list of account exports for a given account.
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
            'account-exports',
            get_defined_vars()
        );
    }

    /**
     * Get information about a specific account export.
     *
     * @param string $exportId           The unique id for the account export.
     * @param array|null $fields         A comma-separated list of fields to return. Reference parameters of
     *                                   sub-objects with dot notation.
     * @param array|null $exclude_fields A comma-separated list of fields to exclude. Reference parameters of
     *                                   sub-objects with dot notation.
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
     * @param array $include_stages        The stages of an account export to include.
     * @param string|null $since_timestamp An ISO 8601 date that will limit the export to only records created after a
     *                                     given time. For instance, the reports stage will contain any campaign sent
     *                                     after the given timestamp. Audiences, however, are excluded from this limit.
     * @return array
     */
    public function add(array $include_stages, ?string $since_timestamp = null): array
    {
        return $this->mailchimp->call(
            'account-exports',
            null,
            get_defined_vars(),
            HttpMethod::POST
        );
    }
}
