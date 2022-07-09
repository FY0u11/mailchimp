<?php

namespace Mailchimp\Api;

use Mailchimp\HttpMethod;

/**
 * Organize your campaigns using folders.
 */
class CampaignFolders extends BaseApi
{
    /**
     * List campaign folders
     *
     * Get all folders used to organize campaigns.
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
            'campaign-folders',
            get_defined_vars()
        );
    }

    /**
     * Get campaign folder
     *
     * Get information about a specific folder used to organize campaigns.
     *
     * @param string $folderId
     * The unique id for the campaign folder.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function getById(string $folderId, ?array $fields=null, ?array $exclude_fields=null): array
    {
        return $this->mailchimp->call(
            "campaign-folders/$folderId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Add campaign folder
     *
     * Create a new campaign folder.
     *
     * @param string $name
     * Name to associate with the folder.
     * @return array
     */
    public function add(string $name): array
    {
        return $this->mailchimp->call(
            'campaign-folders',
            null,
            get_defined_vars(),
            HttpMethod::POST
        );
    }

    /**
     * Update campaign folder
     *
     * Update a specific folder used to organize campaigns.
     *
     * @param string $folderId
     * The unique id for the campaign folder.
     * @param string $name
     * Name to associate with the folder.
     * @return array
     */
    public function update(string $folderId, string $name): array
    {
        return $this->mailchimp->call(
            "campaign-folders/$folderId",
            null,
            compact('name'),
            HttpMethod::PATCH
        );
    }

    /**
     * Delete campaign folder
     *
     * Delete a specific campaign folder, and mark all the campaigns in the folder as 'unfiled'.
     *
     * @param string $folderId
     * The unique id for the campaign folder.
     * @return array
     */
    public function delete(string $folderId): array
    {
        return $this->mailchimp->call(
            "campaign-folders/$folderId",
            null,
            null,
            HttpMethod::DELETE
        );
    }
}
