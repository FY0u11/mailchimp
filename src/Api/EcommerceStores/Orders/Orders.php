<?php

namespace Mailchimp\Api\EcommerceStores\Orders;

use Mailchimp\Api\BaseApi;
use Mailchimp\Api\EcommerceStores\Customer;
use Mailchimp\HttpMethod;

/**
 * Orders represent successful e-commerce transactions, and this data can be used to provide more detailed campaign
 * reports, track sales, and personalize emails to your targeted consumers, and view other e-commerce data in your
 * Mailchimp account.
 */
class Orders extends BaseApi
{
    /**
     * List account orders
     *
     * Get information about an account's orders.
     *
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @param int|null $count
     * The number of records to return. Default value is 10. Maximum value is 1000.
     * @param int|null $offset
     * Used for pagination, this is the number of records from a collection to skip. Default value is 0.
     * @param string|null $campaign_id
     * Restrict results to orders with a specific campaign_id value.
     * @param string|null $outreach_id
     * Restrict results to orders with a specific outreach_id value.
     * @param string|null $customer_id
     * Restrict results to orders made by a specific customer.
     * @param bool|null $has_outreach
     * Restrict results to orders that have an outreach attached. For example, an email campaign or Facebook ad.
     * @return array
     */
    public function getAccountOrders(
        ?array $fields=null,
        ?array $exclude_fields=null,
        ?int $count=null,
        ?int $offset=null,
        ?string $campaign_id=null,
        ?string $outreach_id=null,
        ?string $customer_id=null,
        ?bool $has_outreach=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/orders",
            get_defined_vars()
        );
    }

    /**
     * List orders
     *
     * Get information about a store's orders.
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
     * @param string|null $campaign_id
     * Restrict results to orders with a specific campaign_id value.
     * @param string|null $outreach_id
     * Restrict results to orders with a specific outreach_id value.
     * @param string|null $customer_id
     * Restrict results to orders made by a specific customer.
     * @param bool|null $has_outreach
     * Restrict results to orders that have an outreach attached. For example, an email campaign or Facebook ad.
     * @return array
     */
    public function getStoreOrders(
        string $storeId,
        ?array $fields=null,
        ?array $exclude_fields=null,
        ?int $count=null,
        ?int $offset=null,
        ?string $campaign_id=null,
        ?string $outreach_id=null,
        ?string $customer_id=null,
        ?bool $has_outreach=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/orders",
            compact(
                'fields',
                'exclude_fields',
                'count',
                'offset',
                'campaign_id',
                'outreach_id',
                'customer_id',
                'has_outreach'
            )
        );
    }

    /**
     * Get order info
     *
     * Get information about a specific order.
     *
     * @param string $storeId
     * The store id.
     * @param string $orderId
     * The id for the order in a store.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function getStoreOrder(
        string $storeId,
        string $orderId,
        ?array $fields=null,
        ?array $exclude_fields=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/orders/$orderId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Add order
     *
     * Add a new order to a store.
     *
     * @param string $storeId
     * The store id.
     * @param string $id
     * A unique identifier for the order.
     * @param Customer $customer
     * Information about a specific customer. For existing customers include only the id parameter in the customer
     * object body.
     * @param string $currency_code
     * The three-letter ISO 4217 code for the currency that the store accepts.
     * @param int $order_total
     * The total for the order.
     * @param Lines $lines
     * An array of the order's line items.
     * @param string|null $campaign_id
     * A string that uniquely identifies the campaign for an order.
     * @param string|null $landing_site
     * The URL for the page where the buyer landed when entering the shop.
     * @param string|null $financial_status
     * The order status. Use this parameter to trigger Order Notifications.
     * @param string|null $fulfillment_status
     * The fulfillment status for the order. Use this parameter to trigger Order Notifications.
     * @param string|null $order_url
     * The URL for the order.
     * @param float|null $discount_total
     * The total amount of the discounts to be applied to the price of the order.
     * @param float|null $tax_total
     * The tax total for the order.
     * @param float|null $shipping_total
     * The shipping total for the order.
     * @param string|null $tracking_code
     * The Mailchimp tracking code for the order. Uses the 'mc_tc' parameter in E-Commerce tracking URLs.
     * Possible value: "prec".
     * @param string|null $processed_at_foreign
     * The date and time the order was processed in ISO 8601 format.
     * @param string|null $cancelled_at_foreign
     * The date and time the order was cancelled in ISO 8601 format. Note: passing a value for this parameter will
     * cancel the order being created.
     * @param string|null $updated_at_foreign
     * The date and time the order was updated in ISO 8601 format.
     * @param ShippingAddress|null $shipping_address
     * The shipping address for the order.
     * @param BillingAddress|null $billing_address
     * The billing address for the order.
     * @param Promos|null $promos
     * The promo codes applied on the order
     * @param Outreach|null $outreach
     * The outreach associated with this order. For example, an email campaign or Facebook ad.
     * @param string|null $tracking_number
     * The tracking number associated with the order.
     * @param string|null $tracking_carrier
     * The tracking carrier associated with the order.
     * @param string|null $tracking_url
     * The tracking URL associated with the order.
     * @return array
     */
    public function create(
        string $storeId,
        string $id,
        Customer $customer,
        string $currency_code,
        int $order_total,
        Lines $lines,
        ?string $campaign_id=null,
        ?string $landing_site=null,
        ?string $financial_status=null,
        ?string $fulfillment_status=null,
        ?string $order_url=null,
        ?float $discount_total=null,
        ?float $tax_total=null,
        ?float $shipping_total=null,
        ?string $tracking_code=null,
        ?string $processed_at_foreign=null,
        ?string $cancelled_at_foreign=null,
        ?string $updated_at_foreign=null,
        ?ShippingAddress $shipping_address=null,
        ?BillingAddress $billing_address=null,
        ?Promos $promos=null,
        ?Outreach $outreach=null,
        ?string $tracking_number=null,
        ?string $tracking_carrier=null,
        ?string $tracking_url=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/orders",
            null,
            $this->toArray(get_defined_vars(), ['storeId']),
            HttpMethod::POST
        );
    }

    /**
     * Update order
     *
     * Update a specific order.
     *
     * @param string $storeId
     * The store id.
     * @param string $orderId
     * The id for the order in a store.
     * @param string $id
     * A unique identifier for the order.
     * @param Customer $customer
     * Information about a specific customer. For existing customers include only the id parameter in the customer
     * object body.
     * @param string $currency_code
     * The three-letter ISO 4217 code for the currency that the store accepts.
     * @param int $order_total
     * The total for the order.
     * @param Lines $lines
     * An array of the order's line items.
     * @param string|null $campaign_id
     * A string that uniquely identifies the campaign for an order.
     * @param string|null $landing_site
     * The URL for the page where the buyer landed when entering the shop.
     * @param string|null $financial_status
     * The order status. Use this parameter to trigger Order Notifications.
     * @param string|null $fulfillment_status
     * The fulfillment status for the order. Use this parameter to trigger Order Notifications.
     * @param string|null $order_url
     * The URL for the order.
     * @param float|null $discount_total
     * The total amount of the discounts to be applied to the price of the order.
     * @param float|null $tax_total
     * The tax total for the order.
     * @param float|null $shipping_total
     * The shipping total for the order.
     * @param string|null $tracking_code
     * The Mailchimp tracking code for the order. Uses the 'mc_tc' parameter in E-Commerce tracking URLs.
     * Possible value: "prec".
     * @param string|null $processed_at_foreign
     * The date and time the order was processed in ISO 8601 format.
     * @param string|null $cancelled_at_foreign
     * The date and time the order was cancelled in ISO 8601 format. Note: passing a value for this parameter will
     * cancel the order being created.
     * @param string|null $updated_at_foreign
     * The date and time the order was updated in ISO 8601 format.
     * @param ShippingAddress|null $shipping_address
     * The shipping address for the order.
     * @param BillingAddress|null $billing_address
     * The billing address for the order.
     * @param Promos|null $promos
     * The promo codes applied on the order
     * @param Outreach|null $outreach
     * The outreach associated with this order. For example, an email campaign or Facebook ad.
     * @param string|null $tracking_number
     * The tracking number associated with the order.
     * @param string|null $tracking_carrier
     * The tracking carrier associated with the order.
     * @param string|null $tracking_url
     * The tracking URL associated with the order.
     * @return array
     */
    public function update(
        string $storeId,
        string $orderId,
        ?Customer $customer=null,
        ?string $currency_code=null,
        ?int $order_total=null,
        ?Lines $lines=null,
        ?string $campaign_id=null,
        ?string $landing_site=null,
        ?string $financial_status=null,
        ?string $fulfillment_status=null,
        ?string $order_url=null,
        ?float $discount_total=null,
        ?float $tax_total=null,
        ?float $shipping_total=null,
        ?string $tracking_code=null,
        ?string $processed_at_foreign=null,
        ?string $cancelled_at_foreign=null,
        ?string $updated_at_foreign=null,
        ?ShippingAddress $shipping_address=null,
        ?BillingAddress $billing_address=null,
        ?Promos $promos=null,
        ?Outreach $outreach=null,
        ?string $tracking_number=null,
        ?string $tracking_carrier=null,
        ?string $tracking_url=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/orders/$orderId",
            null,
            $this->toArray(get_defined_vars(), ['storeId', 'orderId']),
            HttpMethod::PATCH
        );
    }

    /**
     * Delete order
     *
     * Delete an order.
     *
     * @param string $storeId
     * The store id.
     * @param string $orderId
     * The id for the order in a store.
     * @return array
     */
    public function delete(string $storeId, string $orderId): array
    {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/orders/$orderId",
            null,
            null,
            HttpMethod::DELETE
        );
    }
}
