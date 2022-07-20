<?php

namespace Mailchimp\Api\EcommerceStores\Carts;

use Mailchimp\Api\BaseApi;
use Mailchimp\Api\EcommerceStores\Customer;
use Mailchimp\HttpMethod;

/**
 * Use Carts to represent unfinished e-commerce transactions. This can be used to create an Abandoned Cart workflow, or
 * to save a consumer’s shopping cart pending a successful Order.
 */
class Carts extends BaseApi
{
    /**
     * List carts
     *
     * Get information about a store's carts.
     *
     * @param string $storeId
     * The store id.
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
        ?array $fields=null,
        ?array $exclude_fields=null,
        ?int $count=null,
        ?int $offset=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/carts",
            compact('fields', 'exclude_fields', 'count', 'offset')
        );
    }

    /**
     * Get cart info
     *
     * Get information about a specific cart.
     *
     * @param string $storeId
     * The store id.
     * @param string $cartId
     * The id for the cart.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function getById(string $storeId, string $cartId, ?array $fields=null, ?array $exclude_fields=null): array
    {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/carts/$cartId",
            compact('fields', 'exclude_fields'),
        );
    }

    /**
     * Add cart
     *
     * Add a new cart to a store.
     *
     * @param string $storeId
     * The store id.
     * @param string $id
     * A unique identifier for the cart.
     * @param Customer $customer
     * Information about a specific customer. For existing customers include only the id parameter in the customer
     * object body.
     * @param string $currency_code
     * The three-letter ISO 4217 code for the currency that the cart uses.
     * @param int $order_total
     * The order total for the cart.
     * @param Lines $lines
     * An array of the cart's line items.
     * @param string|null $campaign_id
     * A string that uniquely identifies the campaign for a cart.
     * @param string|null $checkout_url
     * The URL for the cart. This parameter is required for Abandoned Cart automations.
     * @param int|null $tax_total
     * The total tax for the cart.
     * @return array
     */
    public function add(
        string $storeId,
        string $id,
        Customer $customer,
        string $currency_code,
        int $order_total,
        Lines $lines,
        ?string $campaign_id=null,
        ?string $checkout_url=null,
        ?int $tax_total=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/carts",
            null,
            $this->toArray(get_defined_vars(), ['storeId']),
            HttpMethod::POST
        );
    }

    /**
     * Update cart
     *
     * Update a specific cart.
     *
     * @param string $storeId
     * The store id.
     * @param string $cartId
     * The id for the cart.
     * @param Customer|null $customer
     * Information about a specific customer. Orders for existing customers should include only the id parameter in the
     * customer object body.
     * @param string|null $currency_code
     * The three-letter ISO 4217 code for the currency that the cart uses.
     * @param int|null $order_total
     * The order total for the cart.
     * @param Lines|null $lines
     * An array of the cart's line items.
     * @param string|null $campaign_id
     * A string that uniquely identifies the campaign associated with a cart.
     * @param string|null $checkout_url
     * The URL for the cart. This parameter is required for Abandoned Cart automations.
     * @param int|null $tax_total
     * The total tax for the cart.
     * @return array
     */
    public function update(
        string $storeId,
        string $cartId,
        ?Customer $customer=null,
        ?string $currency_code=null,
        ?int $order_total=null,
        ?Lines $lines=null,
        ?string $campaign_id=null,
        ?string $checkout_url=null,
        ?int $tax_total=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/carts/$cartId",
            null,
            $this->toArray(get_defined_vars(), ['storeId', 'cartId']),
            HttpMethod::PATCH,
        );
    }

    /**
     * Delete cart
     *
     * Delete a cart.
     *
     * @param string $storeId
     * The store id.
     * @param string $cartId
     * The id for the cart.
     * @return array
     */
    public function delete(string $storeId, string $cartId): array
    {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/carts/$cartId",
            null,
            null,
            HttpMethod::DELETE
        );
    }
}
