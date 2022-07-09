<?php

namespace Mailchimp\Api;

/**
 * Manage registered, connected apps for your Mailchimp account with the Authorized Apps endpoints.
 */
class AuthorizedApps extends BaseApi
{
    /**
     * List authorized apps
     *
     * Get a list of account exports for a given account.
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
            'authorized-apps',
            get_defined_vars()
        );
    }

    /**
     * Get authorized app info
     *
     * Get information about a specific authorized application.
     *
     * @param string $appId
     * The unique id for the account export.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function getById(string $appId, ?array $fields=null, ?array $exclude_fields=null): array
    {
        return $this->mailchimp->call(
            "authorized-apps/$appId",
            compact('fields', 'exclude_fields')
        );
    }
}
