<?php

namespace Mailchimp\Api\EcommerceStores\Orders;

use Mailchimp\Api\BaseObject;

/**
 * The outreach associated with this order. For example, an email campaign or Facebook ad.
 */
class Outreach extends BaseObject
{
    /**
     * @var string|null
     * A unique identifier for the outreach. Can be an email campaign ID.
     */
    public ?string $id;

    /**
     * The outreach associated with this order. For example, an email campaign or Facebook ad.
     *
     * @param string|null $id
     * A unique identifier for the outreach. Can be an email campaign ID.
     */
    public function __construct(?string $id=null)
    {
        $this->id = $id;
    }
}
