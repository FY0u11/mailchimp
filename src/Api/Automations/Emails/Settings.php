<?php

namespace Mailchimp\Api\Automations\Emails;

use Mailchimp\Api\BaseObject;

/**
 * Settings for the campaign including the email subject, from name, and from email address.
 */
class Settings extends BaseObject
{
    /**
     * @var string|null The title of the Automation.
     */
    public ?string $title;

    /**
     * @var string|null The subject line for the campaign.
     */
    public ?string $subject_line;

    /**
     * @var string|null The preview text for the campaign.
     */
    public ?string $preview_text;

    /**
     * @var string|null The 'from' name for the Automation (not an email address).
     */
    public ?string $from_name;

    /**
     * @var string|null The reply-to email address for the Automation.
     */
    public ?string $reply_to;

    /**
     * Settings for the campaign including the email subject, from name, and from email address.
     *
     * @param string|null $title        The title of the Automation.
     * @param string|null $subject_line The subject line for the campaign.
     * @param string|null $preview_text The preview text for the campaign.
     * @param string|null $from_name    The 'from' name for the Automation (not an email address).
     * @param string|null $reply_to     The reply-to email address for the Automation.
     */
    public function __construct(
        ?string $title=null,
        ?string $subject_line=null,
        ?string $preview_text=null,
        ?string $from_name=null,
        ?string $reply_to=null
    ) {
        $this->title = $title;
        $this->subject_line = $subject_line;
        $this->preview_text = $preview_text;
        $this->from_name = $from_name;
        $this->reply_to = $reply_to;
    }
}
