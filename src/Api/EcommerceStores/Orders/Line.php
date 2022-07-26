<?php

namespace Mailchimp\Api\EcommerceStores\Orders;

use Mailchimp\Api\BaseObject;

/**
 * Order's line item
 */
class Line extends BaseObject
{
    /**
     * @var string|null
     * A unique identifier for the order line item.
     */
    public ?string $id;

    /**
     * @var string|null
     * A unique identifier for the product associated with the order line item.
     */
    public ?string $product_id;

    /**
     * @var string|null
     * A unique identifier for the product variant associated with the order line item.
     */
    public ?string $product_variant_id;

    /**
     * @var int|null
     * The quantity of an order line item.
     */
    public ?int $quantity;

    /**
     * @var float|null
     * The price of an order line item.
     */
    public ?float $price;

    /**
     * @var float|null
     * The total discount amount applied to this line item.
     */
    public ?float $discount;

    /**
     * Order's line item
     *
     * @param string|null $id
     * A unique identifier for the order line item.
     * @param string|null $product_id
     * A unique identifier for the product associated with the order line item.
     * @param string|null $product_variant_id
     * A unique identifier for the product variant associated with the order line item.
     * @param int|null $quantity
     * The quantity of an order line item.
     * @param float|null $price
     * The price of an order line item.
     * @param float|null
     * The total discount amount applied to this line item.
     */
    public function __construct(
        ?string $id=null,
        ?string $product_id=null,
        ?string $product_variant_id=null,
        ?int $quantity=null,
        ?float $price=null,
        ?float $discount=null
    ) {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->product_variant_id = $product_variant_id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->discount = $discount;
    }
}
