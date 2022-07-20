<?php

namespace Mailchimp\Api\EcommerceStores;

use Mailchimp\Api\BaseObject;

/**
 * Information about a specific customer. For existing customers include only the id parameter in the customer object
 * body.
 */
class Customer extends BaseObject
{
    /**
     * @var string|null
     * The customer's email address.
     */
    public ?string $email_address;

    /**
     * @var bool|null
     * The customer's opt-in status. This value will never overwrite the opt-in status of a pre-existing Mailchimp list
     * member, but will apply to list members that are added through the e-commerce API endpoints. Customers who don't
     * opt in to your Mailchimp list will be added as Transactional members.
     */
    public ?bool $opt_in_status;

    /**
     * @var string|null
     * The customer's company.
     */
    public ?string $company;

    /**
     * @var string|null
     * The customer's first name.
     */
    public ?string $first_name;

    /**
     * @var string|null
     * The customer's last name.
     */
    public ?string $last_name;

    /**
     * @var Address|null
     * The customer's address.
     */
    public ?Address $address;

    /**
     * @var string|null
     * A unique identifier for the customer. Limited to 50 characters.
     */
    public ?string $id;

    /**
     * Information about a specific customer. For existing customers include only the id parameter in the customer
     * object body.
     *
     * @param string|null $email_address
     * The customer's email address.
     * @param bool|null $opt_in_status
     * The customer's opt-in status. This value will never overwrite the opt-in status of a pre-existing Mailchimp list
     * member, but will apply to list members that are added through the e-commerce API endpoints. Customers who don't
     * opt in to your Mailchimp list will be added as Transactional members.
     * @param string|null $company
     * The customer's company.
     * @param string|null $first_name
     * The customer's first name.
     * @param string|null $last_name
     * The customer's last name.
     * @param Address|null $address
     * The customer's address.
     * @param string|null $id
     * A unique identifier for the customer. Limited to 50 characters.
     */
    public function __construct(
        ?string $email_address=null,
        ?bool $opt_in_status=null,
        ?string $company=null,
        ?string $first_name=null,
        ?string $last_name=null,
        ?Address $address=null,
        ?string $id=null
    ) {
        $this->id = $id;
        $this->email_address = $email_address;
        $this->opt_in_status = $opt_in_status;
        $this->company = $company;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->address = $address;
    }
}
