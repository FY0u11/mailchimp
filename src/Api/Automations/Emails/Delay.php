<?php

namespace Mailchimp\Api\Automations\Emails;

use Mailchimp\Api\BaseObject;

/**
 * The delay settings for an automation email.
 */
class Delay extends BaseObject implements DelayInterface
{
    /**
     * @var string|null
     * The action that triggers the delay of an automation emails. Possible values: "signup", "ecomm_abandoned_browse",
     * or "ecomm_abandoned_cart".
     */
    public ?string $action;

    /**
     * @var int|null
     * The delay amount for an automation email.
     */
    public ?int $amount;

    /**
     * @var string|null
     * The type of delay for an automation email. Possible values: "now", "day", "hour", or "week".
     */
    public ?string $type;

    /**
     * @var string|null
     * Whether the delay settings describe before or after the delay action of an  automation email. Possible value:
     * "after".
     */
    public ?string $direction;

    /**
     * The delay settings for an automation email.
     *
     * @param string|null $action
     * The action that triggers the delay of an automation emails. Possible values: "signup", "ecomm_abandoned_browse",
     * or "ecomm_abandoned_cart".
     * @param int|null $amount
     * The delay amount for an automation email.
     * @param string|null $type
     * The type of delay for an automation email. Possible values: "now", "day", "hour", or "week".
     * @param string|null $direction
     * Whether the delay settings describe before or after the delay action of an automation email. Possible value:
     * "after".
     */
    public function __construct(?string $action=null, ?int $amount=null, ?string $type=null, ?string $direction=null)
    {
        $this->action = $action;
        $this->amount = $amount;
        $this->type = $type;
        $this->direction = $direction;
    }
}
