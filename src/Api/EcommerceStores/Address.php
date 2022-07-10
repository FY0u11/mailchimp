<?php

namespace Mailchimp\Api\EcommerceStores;

use Mailchimp\Api\BaseObject;

/**
 * The store address.
 */
class Address extends BaseObject
{
    /**
     * @var string|null
     * The store's mailing address.
     */
    public ?string $address1;

    /**
     * @var string|null
     * An additional field for the store's mailing address.
     */
    public ?string $address2;

    /**
     * @var string|null
     * The city the store is located in.
     */
    public ?string $city;

    /**
     * @var string|null
     * The store's state name or normalized province.
     */
    public ?string $province;

    /**
     * @var string|null
     * The two-letter code for the store's province or state.
     */
    public ?string $province_code;

    /**
     * @var string|null
     * The store's postal or zip code.
     */
    public ?string $postal_code;

    /**
     * @var string|null
     * The store's country.
     */
    public ?string $country;

    /**
     * @var string|null
     * The two-letter code for to the store's country.
     */
    public ?string $country_code;

    /**
     * @var int|null
     * The longitude of the store location.
     */
    public ?int $longitude;

    /**
     * @var int|null
     * The latitude of the store location.
     */
    public ?int $latitude;

    /**
     * The store address.
     *
     * @param string|null $address1
     * The store's mailing address.
     * @param string|null $address2
     * An additional field for the store's mailing address.
     * @param string|null $city
     * The city the store is located in.
     * @param string|null $province
     * The store's state name or normalized province.
     * @param string|null $province_code
     * The two-letter code for the store's province or state.
     * @param string|null $postal_code
     * The store's postal or zip code.
     * @param string|null $country
     * The store's country.
     * @param string|null $country_code
     * The two-letter code for to the store's country.
     * @param int|null $longitude
     * The longitude of the store location.
     * @param int|null $latitude
     * The latitude of the store location.
     */
    public function __construct(
        ?string $address1=null,
        ?string $address2=null,
        ?string $city=null,
        ?string $province=null,
        ?string $province_code=null,
        ?string $postal_code=null,
        ?string $country=null,
        ?string $country_code=null,
        ?int $longitude=null,
        ?int $latitude=null
    ) {
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->city = $city;
        $this->province = $province;
        $this->province_code = $province_code;
        $this->postal_code = $postal_code;
        $this->country = $country;
        $this->country_code = $country_code;
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }
}
