<?php

namespace Mailchimp\Api;

/**
 * Get the latest Chimp Chatter activity from your account.
 */
class ChimpChatterActivity extends BaseApi
{
    /**
     * Get the latest chimp chatter
     *
     * Return the Chimp Chatter for this account ordered by most recent.
     *
     * @param int|null $count
     * The number of records to return. Default value is 10. Maximum value is 1000
     * @param int|null $offset
     * Used for pagination, this is the number of records from a collection to skip. Default value is 0.
     * @return array
     */
    public function getAll(?int $count=null, ?int $offset=null): array
    {
        return $this->mailchimp->call('activity-feed/chimp-chatter', get_defined_vars());
    }
}
