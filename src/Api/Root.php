<?php

namespace Mailchimp\Api;

/**
 * The API root resource links to all other resources available in the API. Calling the root directory
 * also returns details about the Mailchimp user account.
 */
class Root extends AbstractApi
{
    /**
     * Get links to all other resources available in the API.
     *
     * @param array|null $fields          A comma-separated list of fields to return. Reference parameters of
     *                                    sub-objects with dot notation.
     * @param array|null $exclude_fields  A comma-separated list of fields to exclude. Reference parameters of
     *                                    sub-objects with dot notation.
     * @return array
     */
    public function getAll(array $fields = null, array $exclude_fields = null): array
    {
        return $this->mailchimp->call('', compact('fields', 'exclude_fields'));
    }
}
