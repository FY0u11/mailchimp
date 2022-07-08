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
     * @param array|null $fields
     * @param array|null $exclude_fields
     * @return array
     */
    public function getAll(array $fields = null, array $exclude_fields = null): array
    {
        return $this->mailchimp->call('', compact('fields', 'exclude_fields'));
    }
}
