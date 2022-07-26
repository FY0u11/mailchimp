<?php

namespace Mailchimp\Api\EcommerceStores\Orders;

use Mailchimp\Api\BaseObject;

/**
 * The promo codes applied on the order
 */
class Promos extends BaseObject implements PromosInterface
{
    /**
     * @var string|null
     * The Promo Code
     */
    public ?string $code;

    /**
     * @var float|null
     * The amount of discount applied on the total price. For example if the total cost was $100 and the customer paid
     * $95.5, amount_discounted will be 4.5 For free shipping set amount_discounted to 0
     */
    public ?float $amount_discounted;

    /**
     * @var string|null
     * Type of discount. For free shipping set type to fixed Possible values: "fixed" or "percentage".
     */
    public ?string $type;

    /**
     * The promo codes applied on the order
     *
     * @param string|null $code
     * The Promo Code
     * @param float|null $amount_discounted
     * The amount of discount applied on the total price. For example if the total cost was $100 and the customer paid
     * $95.5, amount_discounted will be 4.5 For free shipping set amount_discounted to 0
     * @param string|null $type
     * Type of discount. For free shipping set type to fixed Possible values: "fixed" or "percentage".
     */
    public function __construct(?string $code=null, ?float $amount_discounted=null, ?string $type=null)
    {
        $this->code = $code;
        $this->amount_discounted = $amount_discounted;
        $this->type = $type;
    }
}
