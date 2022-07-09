<?php

namespace Mailchimp\Api\Automations;

use Mailchimp\Api\BaseObject;

/**
 * The settings for the Automation workflow.
 */
class Settings extends BaseObject
{
    /**
     * @var string|null
     * The 'from' name for the Automation (not an email address).
     */
    public ?string $from_name;

    /**
     * @var string|null
     * The reply-to email address for the Automation.
     */
    public ?string $reply_to;

    /**
     * The settings for the Automation workflow.
     *
     * @param string|null $from_name
     * The 'from' name for the Automation (not an email address).
     * @param string|null $reply_to
     * The reply-to email address for the Automation.
     */
    public function __construct(?string $from_name=null, ?string $reply_to=null)
    {
        $this->from_name = $from_name;
        $this->reply_to = $reply_to;
    }
}
