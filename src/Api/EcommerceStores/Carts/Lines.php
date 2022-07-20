<?php

namespace Mailchimp\Api\EcommerceStores\Carts;

use Mailchimp\Api\BaseObjectsCollection;

/**
 * An array of the cart's line items.
 */
class Lines extends BaseObjectsCollection
{
    /**
     * @param Line[] $lines
     */
    public function __construct(?array $lines=[])
    {
        parent::__construct($lines);
    }
}
