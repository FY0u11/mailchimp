<?php

namespace Mailchimp\Api\EcommerceStores;

use Mailchimp\Api\BaseApi;
use Mailchimp\HttpMethod;

/**
 * A Product Image represents a specific product image.
 */
class ProductImages extends BaseApi
{
    /**
     * List product images
     *
     * Get information about a product's images.
     *
     * @param string $storeId
     * The store id.
     * @param string $productId
     * The id for the product of a store.
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
        string $productId,
        ?array $fields=null,
        ?array $exclude_fields=null,
        ?int $count=null,
        ?int $offset=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/products/$productId/images",
            compact('fields', 'exclude_fields', 'count', 'offset')
        );
    }

    /**
     * Get product image info
     *
     * Get information about a specific product image.
     *
     * @param string $storeId
     * The store id.
     * @param string $productId
     * The id for the product of a store.
     * @param string $imageId
     * The id for the product image.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function get(
        string $storeId,
        string $productId,
        string $imageId,
        ?array $fields=null,
        ?array $exclude_fields=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/products/$productId/images/$imageId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Add product image
     *
     * Add a new image to the product.
     *
     * @param string $storeId
     * The store id.
     * @param string $productId
     * The id for the product of a store.
     * @param string $id
     * A unique identifier for the product image.
     * @param string $url
     * The URL for a product image.
     * @param array<string>|null $variant_ids
     * The list of product variants using the image.
     * @return array
     */
    public function create(
        string $storeId,
        string $productId,
        string $id,
        string $url,
        ?array $variant_ids=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/products/$productId/images",
            null,
            $this->toArray(get_defined_vars(), ['storeId', 'productId']),
            HttpMethod::POST
        );
    }

    /**
     * Update product image
     *
     * Update a product image.
     *
     * @param string $storeId
     * The store id.
     * @param string $productId
     * The id for the product of a store.
     * @param string $imageId
     * The id for the product image.
     * @param string|null $id
     * A unique identifier for the product image.
     * @param string|null $url
     * The URL for a product image.
     * @param array<string>|null $variant_ids
     * The list of product variants using the image.
     * @return array
     */
    public function update(
        string $storeId,
        string $productId,
        string $imageId,
        ?string $id=null,
        ?string $url=null,
        ?array $variant_ids=null
    ): array {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/products/$productId/images/$imageId",
            null,
            $this->toArray(get_defined_vars(), ['storeId', 'productId', 'imageId']),
            HttpMethod::PATCH
        );
    }

    /**
     * Delete product image
     *
     * Delete a product image.
     *
     * @param string $storeId
     * The store id.
     * @param string $productId
     * The id for the product of a store.
     * @param string $imageId
     * The id for the product image.
     * @return array
     */
    public function delete(string $storeId, string $productId, string $imageId): array
    {
        return $this->mailchimp->call(
            "ecommerce/stores/$storeId/products/$productId/images/$imageId",
            null,
            null,
            HttpMethod::DELETE
        );
    }
}
