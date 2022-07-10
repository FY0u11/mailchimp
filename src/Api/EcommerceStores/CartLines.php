<?php

namespace Mailchimp\Api\EcommerceStores;

use Mailchimp\Api\BaseApi;
use Mailchimp\HttpMethod;

/**
 * Each Cart contains one or more Cart Lines, which represent a specific Product Variant that a Customer has added to
 * their shopping cart.
 */
class CartLines extends BaseApi
{
    /**
     * List cart line items
     *
     * Get information about a cart's line items.
     *
     * @param string $storeId
     * The store id.
     * @param string $cartId
     * The id for the cart.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @param int|null $count
     * The number of records to return. Default value is 10. Maximum value is 1000.
     * @param int|null $offset
     * Used for pagination, this is the number of records from a collection to skip. Default value is 0.
     * @return array
     */
    public function getAll(
        string $storeId,
        string $cartId,
        ?array $fields=null,
        ?array $exclude_fields=null,
        ?int $count=null,
        ?int $offset=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/carts/$cartId/lines",
            compact('fields', 'exclude_fields', 'count', 'offset')
        );
    }

    /**
     * Get cart line item
     *
     * Get information about a specific cart line item.
     *
     * @param string $storeId
     * The store id.
     * @param string $cartId
     * The id for the cart.
     * @param string $lineId
     * The id for the line item of a cart.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function getById(
        string $storeId,
        string $cartId,
        string $lineId,
        ?array $fields=null,
        ?array $exclude_fields=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/carts/$cartId/lines/$lineId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Add cart line item
     *
     * Add a new line item to an existing cart.
     *
     * @param string $storeId
     * The store id.
     * @param string $cartId
     * The id for the cart.
     * @param string $id
     * A unique identifier for the cart line item.
     * @param string $product_id
     * A unique identifier for the product associated with the cart line item.
     * @param string $product_variant_id
     * A unique identifier for the product variant associated with the cart line item.
     * @param int $quantity
     * The quantity of a cart line item.
     * @param int $price
     * The price of a cart line item.
     * @return array
     */
    public function add(
        string $storeId,
        string $cartId,
        string $id,
        string $product_id,
        string $product_variant_id,
        int $quantity,
        int $price
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/carts/$cartId/lines",
            null,
            $this->toArray(get_defined_vars(), ['storeId', 'cartId']),
            HttpMethod::POST
        );
    }

    /**
     * Update cart line item
     *
     * Update a specific cart line item.
     *
     * @param string $storeId
     * The store id.
     * @param string $cartId
     * The id for the cart.
     * @param string $lineId
     * The id for the line item of a cart.
     * @param string|null $product_id
     * A unique identifier for the product associated with the cart line item.
     * @param string|null $product_variant_id
     * A unique identifier for the product variant associated with the cart line item.
     * @param int|null $quantity
     * The quantity of a cart line item.
     * @param int|null $price
     * The price of a cart line item.
     * @return array
     */
    public function update(
        string $storeId,
        string $cartId,
        string $lineId,
        ?string $product_id=null,
        ?string $product_variant_id=null,
        ?int $quantity=null,
        ?int $price=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/carts/$cartId/lines/$lineId",
            null,
            $this->toArray(get_defined_vars(), ['storeId', 'cartId', 'lineId']),
            HttpMethod::PATCH
        );
    }

    /**
     * Delete cart line item
     *
     * Delete a specific cart line item.
     *
     * @param string $storeId
     * The store id.
     * @param string $cartId
     * The id for the cart.
     * @param string $lineId
     * The id for the line item of a cart.
     * @return array
     */
    public function delete(string $storeId, string $cartId, string $lineId): array
    {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/carts/$cartId/lines/$lineId",
            null,
            null,
            HttpMethod::DELETE
        );
    }
}
