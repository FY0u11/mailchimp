<?php

namespace Mailchimp\Api\EcommerceStores;

use Mailchimp\Api\BaseApi;
use Mailchimp\HttpMethod;

/**
 * Each Order contains one or more Order Lines, which represent a specific Product Variant that a Customer purchases.
 */
class OrderLines extends BaseApi
{
    /**
     * List order line items
     *
     * Get information about an order's line items.
     *
     * @param string $storeId
     * The store id.
     * @param string $orderId
     * The id for the order in a store.
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
        string $orderId,
        ?array $fields=null,
        ?array $exclude_fields=null,
        ?int $count=null,
        ?int $offset=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/orders/$orderId/lines",
            compact('fields', 'exclude_fields', 'count', 'offset')
        );
    }

    /**
     * Get order line item
     *
     * Get information about a specific order line item.
     *
     * @param string $storeId
     * The store id.
     * @param string $orderId
     * The id for the order in a store.
     * @param string $lineId
     * The id for the line item of an order.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function get(
        string $storeId,
        string $orderId,
        string $lineId,
        ?array $fields=null,
        ?array $exclude_fields=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/orders/$orderId/lines/$lineId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Add order line item
     *
     * Add a new line item to an existing order.
     *
     * @param string $storeId
     * The store id.
     * @param string $orderId
     * The id for the order in a store.
     * @param string $id
     * A unique identifier for the order line item.
     * @param string $product_id
     * A unique identifier for the product associated with the order line item.
     * @param string $product_variant_id
     * A unique identifier for the product variant associated with the order line item.
     * @param int $quantity
     * The quantity of an order line item.
     * @param float $price
     * The price of an order line item.
     * @param float|null $discount
     * The total discount amount applied to this line item.
     * @return array
     */
    public function create(
        string $storeId,
        string $orderId,
        string $id,
        string $product_id,
        string $product_variant_id,
        int $quantity,
        float $price,
        ?float $discount=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/orders/$orderId/lines",
            null,
            $this->toArray(get_defined_vars(), ['storeId', 'orderId']),
            HttpMethod::POST
        );
    }

    /**
     * Update order line item
     *
     * Update a specific order line item.
     *
     * @param string $storeId
     * The store id.
     * @param string $orderId
     * The id for the order in a store.
     * @param string $lineId
     * The id for the line item of an order.
     * @param string|null $product_id
     * A unique identifier for the product associated with the order line item.
     * @param string|null $product_variant_id
     * A unique identifier for the product variant associated with the order line item.
     * @param int|null $quantity
     * The quantity of an order line item.
     * @param float|null $price
     * The price of an order line item.
     * @param float|null $discount
     * The total discount amount applied to this line item.
     * @return array
     */
    public function update(
        string $storeId,
        string $orderId,
        string $lineId,
        ?string $product_id=null,
        ?string $product_variant_id=null,
        ?int $quantity=null,
        ?float $price=null,
        ?float $discount=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/orders/$orderId/lines/$lineId",
            null,
            $this->toArray(get_defined_vars(), ['storeId', 'orderId', 'lineId']),
            HttpMethod::PATCH
        );
    }

    /**
     * Delete order line item
     *
     * Delete a specific order line item.
     *
     * @param string $storeId
     * The store id.
     * @param string $orderId
     * The id for the order in a store.
     * @param string $lineId
     * The id for the line item of an order.
     * @return array
     */
    public function delete(string $storeId, string $orderId, string $lineId): array
    {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/orders/$orderId/lines/$lineId",
            null,
            null,
            HttpMethod::DELETE
        );
    }
}
