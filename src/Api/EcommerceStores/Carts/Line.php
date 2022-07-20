<?php

namespace Mailchimp\Api\EcommerceStores\Carts;

use Mailchimp\Api\BaseObject;

/**
 * Cart's line item
 */
class Line extends BaseObject
{
    /**
     * @var string|null
     * A unique identifier for the cart line item.
     */
    public ?string $id;

    /**
     * @var string|null
     * A unique identifier for the product associated with the cart line item.
     */
    public ?string $product_id;

    /**
     * @var string|null
     * A unique identifier for the product variant associated with the cart line item.
     */
    public ?string $product_variant_id;

    /**
     * @var int|null
     * The quantity of a cart line item.
     */
    public ?int $quantity;

    /**
     * @var float|null
     * The price of a cart line item.
     */
    public ?float $price;

    /**
     * Cart's line item
     *
     * @param string|null $id
     * A unique identifier for the cart line item.
     * @param string|null $product_id
     * A unique identifier for the product associated with the cart line item.
     * @param string|null $product_variant_id
     * A unique identifier for the product variant associated with the cart line item.
     * @param int|null $quantity
     * The quantity of a cart line item.
     * @param float|null $price
     * The price of a cart line item.
     */
    public function __construct(
        ?string $id=null,
        ?string $product_id=null,
        ?string $product_variant_id=null,
        ?int $quantity=null,
        ?float $price=null
    ) {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->product_variant_id = $product_variant_id;
        $this->quantity = $quantity;
        $this->price = $price;
    }
}
