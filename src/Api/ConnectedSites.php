<?php

namespace Mailchimp\Api;

use Mailchimp\HttpMethod;

/**
 * Manage sites you've connected to your Mailchimp account.
 */
class ConnectedSites extends BaseApi
{
    /**
     * List connected sites
     *
     * Get all connected sites in an account.
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
            'connected-sites',
            get_defined_vars()
        );
    }

    /**
     * Get connected site
     *
     * Get information about a specific connected site.
     *
     * @param string $connectedSiteId
     * The unique identifier for the site.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function getById(string $connectedSiteId, ?array $fields=null, ?array $exclude_fields=null): array
    {
        return $this->mailchimp->call(
            "connected-sites/$connectedSiteId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Add connected site
     *
     * Create a new Mailchimp connected site.
     *
     * @param string $foreign_id
     * The unique identifier for the site.
     * @param string $domain
     * The connected site domain.
     * @return array
     */
    public function add(string $foreign_id, string $domain): array
    {
        return $this->mailchimp->call(
            'connected-sites',
            null,
            get_defined_vars(),
            HttpMethod::POST
        );
    }

    /**
     * Verify connected site script
     *
     * Verify that the connected sites script has been installed, either via the script URL or fragment.
     *
     * @param string $connectedSiteId
     * The unique identifier for the site.
     * @return array
     */
    public function verify(string $connectedSiteId): array
    {
        return $this->mailchimp->call(
            "connected-sites/$connectedSiteId/actions/verify-script-installation",
            null,
            null,
            HttpMethod::POST
        );
    }

    /**
     * Delete connected site
     *
     * Remove a connected site from your Mailchimp account.
     *
     * @param string $connectedSiteId
     * The unique identifier for the site.
     * @return array
     */
    public function delete(string $connectedSiteId): array
    {
        return $this->mailchimp->call(
            "connected-sites/$connectedSiteId",
            null,
            null,
            HttpMethod::DELETE
        );
    }
}
