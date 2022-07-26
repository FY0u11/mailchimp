<?php

namespace Mailchimp\Api\EcommerceStores;

use Mailchimp\Api\BaseApi;
use Mailchimp\HttpMethod;

/**
 * Add Customers to your Store to track their orders and to view E-Commerce Data for your Mailchimp lists and campaigns.
 * Each Customer is connected to a Mailchimp list member, so adding a Customer can also add or update a list member.
 */
class Customers extends BaseApi
{
    /**
     * List customers
     *
     * Get information about a store's customers.
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
     * @param string|null $email_address
     * Restrict the response to customers with the email address.
     * @return array
     */
    public function getAll(
        string $storeId,
        ?array $fields=null,
        ?array $exclude_fields=null,
        ?int $count=null,
        ?int $offset=null,
        ?string $email_address=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/customers",
            compact('fields', 'exclude_fields', 'count', 'offset', 'email_address')
        );
    }

    /**
     * Get customer info
     *
     * Get information about a specific customer.
     *
     * @param string $storeId
     * The store id.
     * @param string $customerId
     * The id for the customer of a store.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function get(
        string $storeId,
        string $customerId,
        ?array $fields=null,
        ?array $exclude_fields=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/customers/$customerId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Add customer
     *
     * Add a new customer to a store.
     *
     * @param string $storeId
     * The store id.
     * @param Customer $customer
     * Customer to create
     * @return array
     */
    public function create(
        string $storeId,
        Customer $customer
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/customers",
            null,
            $this->toArray(get_defined_vars())['customer'],
            HttpMethod::POST
        );
    }

    /**
     * Update customer
     *
     * Update a customer.
     *
     * @param string $storeId
     * The store id.
     * @param string $customerId
     * The id for the customer of a store.
     * @param Customer $customer
     * Customer to create
     * @return array
     */
    public function update(
        string $storeId,
        string $customerId,
        Customer $customer
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/customers/$customerId",
            null,
            $this->toArray(get_defined_vars())['customer'],
            HttpMethod::PATCH
        );
    }

    /**
     * Add or update customer
     *
     * Add or update a customer.
     *
     * @param string $storeId
     * The store id.
     * @param string $customerId
     * The id for the customer of a store.
     * @param Customer $customer
     * Customer to create
     * @return array
     */
    public function createOrUpdate(
        string $storeId,
        string $customerId,
        Customer $customer
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/customers/$customerId",
            null,
            $this->toArray(get_defined_vars())['customer'],
            HttpMethod::PUT
        );
    }

    /**
     * Delete customer
     *
     * Delete a customer from a store.
     *
     * @param string $storeId
     * The store id.
     * @param string $customerId
     * The id for the customer of a store.
     * @return array
     */
    public function delete(string $storeId, string $customerId): array
    {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/customers/$customerId",
            null,
            null,
            HttpMethod::DELETE
        );
    }
}
