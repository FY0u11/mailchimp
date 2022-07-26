<?php

namespace Mailchimp\Api\EcommerceStores\Orders;

use Mailchimp\Api\BaseObjectsCollection;

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
