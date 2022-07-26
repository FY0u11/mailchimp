<?php

namespace Mailchimp\Api\EcommerceStores;

use Mailchimp\Api\BaseApi;
use Mailchimp\Api\EcommerceStores\Carts\Carts;
use Mailchimp\HttpMethod;
use Mailchimp\MailchimpInterface;

/**
 * Connect your E-commerce Store to Mailchimp to take advantage of powerful reporting and personalization features and
 * to learn more about your customers.
 */
class EcommerceStores extends BaseApi
{
    /**
     * @var CartLines
     * Each Cart contains one or more Cart Lines, which represent a specific Product Variant that a Customer has added
     * to their shopping cart.
     */
    public CartLines $cartLines;

    /**
     * @var Carts
     * Use Carts to represent unfinished e-commerce transactions. This can be used to create an Abandoned Cart workflow,
     * or to save a consumer’s shopping cart pending a successful Order.
     */
    public Carts $carts;

    /**
     * @var Customers
     * Add Customers to your Store to track their orders and to view E-Commerce Data for your Mailchimp lists and
     * campaigns. Each Customer is connected to a Mailchimp list member, so adding a Customer can also add or update a
     * list member.
     */
    public Customers $customers;

    /**
     * @var OrderLines
     * Each Order contains one or more Order Lines, which represent a specific Product Variant that a Customer purchases.
     */
    public OrderLines $orderLines;

    /**
     * Connect your E-commerce Store to Mailchimp to take advantage of powerful reporting and personalization features
     * and to learn more about your customers.
     *
     * @param MailchimpInterface $mailchimp
     */
    public function __construct(MailchimpInterface $mailchimp)
    {
        parent::__construct($mailchimp);

        $this->cartLines = new CartLines($mailchimp);
        $this->carts = new Carts($mailchimp);
        $this->customers = new Customers($mailchimp);
        $this->orderLines = new OrderLines($mailchimp);
    }

    /**
     * List stores
     *
     * Get information about all stores in the account.
     *
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
        ?array $fields=null,
        ?array $exclude_fields=null,
        ?int $count=null,
        ?int $offset=null
    ): array {
        return $this->mailchimp->call(
            'ecommerce/stores',
            get_defined_vars()
        );
    }

    /**
     * Get store info
     *
     * Get information about a specific store.
     *
     * @param string $storeId
     * The store id.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function getById(string $storeId, ?array $fields=null, ?array $exclude_fields=null): array
    {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Add store
     *
     * Add a new store to your Mailchimp account.
     *
     * @param string $id
     * The unique identifier for the store.
     * @param string $list_id
     * The unique identifier for the list associated with the store. The list_id for a specific store cannot change.
     * @param string $name
     * The name of the store.
     * @param string $currency_code
     * The three-letter ISO 4217 code for the currency that the store accepts.
     * @param string|null $platform
     * The e-commerce platform of the store.
     * @param string|null $domain
     * The store domain. This parameter is required for Connected Sites and Google Ads.
     * @param bool|null $is_syncing
     * Whether to disable automations because the store is currently syncing.
     * @param string|null $email_address
     * The email address for the store.
     * @param string|null $money_format
     * The currency format for the store. For example: $, £, etc.
     * @param string|null $primary_locale
     * The primary locale for the store. For example: en, de, etc.
     * @param string|null $timezone
     * The timezone for the store.
     * @param string|null $phone
     * The store phone number.
     * @param Address|null $address
     * The store address.
     * @return array
     */
    public function add(
        string $id,
        string $list_id,
        string $name,
        string $currency_code,
        ?string $platform=null,
        ?string $domain=null,
        ?bool $is_syncing=null,
        ?string $email_address=null,
        ?string $money_format=null,
        ?string $primary_locale=null,
        ?string $timezone=null,
        ?string $phone=null,
        ?Address $address=null
    ): array {
        return $this->mailchimp->call(
            'ecommerce/stores',
            null,
            $this->toArray(get_defined_vars()),
            HttpMethod::POST
        );
    }

    /**
     * Update store
     *
     * Update a store.
     *
     * @param string $storeId
     * The store id.
     * @param string|null $name
     * The name of the store.
     * @param string|null $currency_code
     * The three-letter ISO 4217 code for the currency that the store accepts.
     * @param string|null $platform
     * The e-commerce platform of the store.
     * @param string|null $domain
     * The store domain.
     * @param bool|null $is_syncing
     * Whether to disable automations because the store is currently syncing.
     * @param string|null $email_address
     * The email address for the store.
     * @param string|null $money_format
     * The currency format for the store. For example: $, £, etc.
     * @param string|null $primary_locale
     * The primary locale for the store. For example: en, de, etc.
     * @param string|null $timezone
     * The timezone for the store.
     * @param string|null $phone
     * The store phone number.
     * @param Address|null $address
     * The store address.
     * @return array
     */
    public function update(
        string $storeId,
        ?string $name=null,
        ?string $currency_code=null,
        ?string $platform=null,
        ?string $domain=null,
        ?bool $is_syncing=null,
        ?string $email_address=null,
        ?string $money_format=null,
        ?string $primary_locale=null,
        ?string $timezone=null,
        ?string $phone=null,
        ?Address $address=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId",
            null,
            $this->toArray(get_defined_vars(), ['storeId']),
            HttpMethod::PATCH
        );
    }

    /**
     * Delete store
     *
     * Delete a store. Deleting a store will also delete any associated subresources, including Customers, Orders,
     * Products, and Carts.
     *
     * @param string $storeId
     * The store id.
     * @return array
     */
    public function delete(string $storeId): array
    {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId",
            null,
            null,
            HttpMethod::DELETE
        );
    }
}
