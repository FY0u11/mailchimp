<?php

namespace Mailchimp\Api\Automations;

use Mailchimp\Api\BaseObject;

/**
 * List settings for the Automation.
 */
class Recipients extends BaseObject
{
    /**
     * @var string The id of the store.
     */
    public string $store_id;

    /**
     * @var string|null The id of the List.
     */
    public ?string $list_id;

    /**
     * @param string $store_id     The id of the store.
     * @param string|null $list_id The id of the List
     */
    public function __construct(string $store_id, ?string $list_id=null)
    {
        $this->list_id = $list_id;
        $this->store_id = $store_id;
    }
}
