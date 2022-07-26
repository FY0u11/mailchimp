<?php

namespace Mailchimp\Api\EcommerceStores\Orders;

use Mailchimp\Api\BaseObject;

/**
 * The shipping address for the order.
 */
class ShippingAddress extends BaseObject
{
    /**
     * @var string|null
     * The name associated with the shipping address.
     */
    public ?string $name;

    /**
     * @var string|null
     * The shipping address for the order.
     */
    public ?string $address1;

    /**
     * @var string|null
     * An additional field for the shipping address.
     */
    public ?string $address2;

    /**
     * @var string|null
     * The city in the shipping address.
     */
    public ?string $city;

    /**
     * @var string|null
     * The state or normalized province in the shipping address.
     */
    public ?string $province;

    /**
     * @var string|null
     * The two-letter code for the province in the shipping address.
     */
    public ?string $province_code;

    /**
     * @var string|null
     * The postal or zip code in the shipping address.
     */
    public ?string $postal_code;

    /**
     * @var string|null
     * The country in the shipping address.
     */
    public ?string $country;

    /**
     * @var string|null
     * The two-letter code for the country in the shipping address.
     */
    public ?string $country_code;

    /**
     * @var float|null
     * The longitude for the shipping address location.
     */
    public ?float $longitude;

    /**
     * @var float|null
     * The latitude for the shipping address location.
     */
    public ?float $latitude;

    /**
     * @var string|null
     * The phone number for the shipping address
     */
    public ?string $phone;

    /**
     * @var string|null
     * The company associated with the shipping address.
     */
    public ?string $company;

    /**
     * The shipping address for the order.
     *
     * @param string|null $name
     * The name associated with the shipping address.
     * @param string|null $address1
     * The shipping address for the order.
     * @param string|null $address2
     * An additional field for the shipping address.
     * @param string|null $city
     * The city in the shipping address.
     * @param string|null $province
     * The state or normalized province in the shipping address.
     * @param string|null $province_code
     * The two-letter code for the province in the shipping address.
     * @param string|null $postal_code
     * The postal or zip code in the shipping address.
     * @param string|null $country
     * The country in the shipping address.
     * @param string|null $country_code
     * The two-letter code for the country in the shipping address.
     * @param float|null $longitude
     * The longitude for the shipping address location.
     * @param float|null $latitude
     * The latitude for the shipping address location.
     * @param string|null $phone
     * The phone number for the shipping address
     * @param string|null $company
     * The company associated with the shipping address.
     */
    public function __construct(
        ?string $name=null,
        ?string $address1=null,
        ?string $address2=null,
        ?string $city=null,
        ?string $province=null,
        ?string $province_code=null,
        ?string $postal_code=null,
        ?string $country=null,
        ?string $country_code=null,
        ?float $longitude=null,
        ?float $latitude=null,
        ?string $phone=null,
        ?string $company=null
    ) {
        $this->name = $name;
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
        $this->phone = $phone;
        $this->company = $company;
    }
}
