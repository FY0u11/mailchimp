<?php

namespace Mailchimp\Api\Campaigns;

use Mailchimp\Api\BaseObject;

/**
 * The settings for your campaign, including subject, from name, reply-to address, and more.
 */
class Settings extends BaseObject
{
    /**
     * @var string|null
     * The subject line for the campaign.
     */
    public ?string $subject_line;

    /**
     * @var string|null
     * The preview text for the campaign.
     */
    public ?string $preview_text;

    /**
     * @var string|null
     * The title of the campaign.
     */
    public ?string $title;

    /**
     * @var string|null
     * The 'from' name on the campaign (not an email address).
     */
    public ?string $from_name;

    /**
     * @var string|null
     * The reply-to email address for the campaign. Note: while this field is not required for campaign creation, it is
     * required for sending.
     */
    public ?string $reply_to;

    /**
     * @var bool|null
     * Use Mailchimp Conversation feature to manage out-of-office replies.
     */
    public ?bool $use_conversation;

    /**
     * @var string|null
     * The campaign's custom 'To' name. Typically, the first name audience field.
     */
    public ?string $to_name;

    /**
     * @var string|null
     * If the campaign is listed in a folder, the id for that folder.
     */
    public ?string $folder_id;

    /**
     * @var bool|null
     * Whether Mailchimp authenticated the campaign. Defaults to true.
     */
    public ?bool $authenticate;

    /**
     * @var bool|null
     * Automatically append Mailchimp's default footer to the campaign.
     */
    public ?bool $auto_footer;

    /**
     * @var bool|null
     * Automatically inline the CSS included with the campaign content.
     */
    public ?bool $inline_css;

    /**
     * @var bool|null
     * Automatically tweet a link to the campaign archive page when the campaign is sent.
     */
    public ?bool $auto_tweet;

    /**
     * @var array|null
     * An array of Facebook page ids to auto-post to.
     */
    public ?array $auto_fb_post;

    /**
     * @var bool|null
     * Allows Facebook comments on the campaign (also force-enables the Campaign Archive toolbar). Defaults to true.
     */
    public ?bool $fb_comments;

    /**
     * @var int|null
     * The id of the template to use.
     */
    public ?int $template_id;

    /**
     * The settings for your campaign, including subject, from name, reply-to address, and more.
     *
     * @param string|null $subject_line
     * The subject line for the campaign.
     * @param string|null $preview_text
     * The preview text for the campaign.
     * @param string|null $title
     * The title of the campaign.
     * @param string|null $from_name
     * The 'from' name on the campaign (not an email address).
     * @param string|null $reply_to
     * The reply-to email address for the campaign. Note: while this field is not required for campaign creation, it is
     * required for sending.
     * @param bool|null $use_conversation
     * Use Mailchimp Conversation feature to manage out-of-office replies.
     * @param string|null $to_name
     * The campaign's custom 'To' name. Typically, the first name audience field.
     * @param string|null $folder_id
     * If the campaign is listed in a folder, the id for that folder.
     * @param bool|null $authenticate
     * Whether Mailchimp authenticated the campaign. Defaults to true.
     * @param bool|null $auto_footer
     * Automatically append Mailchimp's default footer to the campaign.
     * @param bool|null $inline_css
     * Automatically inline the CSS included with the campaign content.
     * @param bool|null $auto_tweet
     * Automatically tweet a link to the campaign archive page when the campaign is sent.
     * @param array|null $auto_fb_post
     * An array of Facebook page ids to auto-post to.
     * @param bool|null $fb_comments
     * Allows Facebook comments on the campaign (also force-enables the Campaign Archive toolbar). Defaults to true.
     * @param int|null $template_id
     * The id of the template to use.
     */
    public function __construct(
        ?string $subject_line=null,
        ?string $preview_text=null,
        ?string $title=null,
        ?string $from_name=null,
        ?string $reply_to=null,
        ?bool $use_conversation=null,
        ?string $to_name=null,
        ?string $folder_id=null,
        ?bool $authenticate=null,
        ?bool $auto_footer=null,
        ?bool $inline_css=null,
        ?bool $auto_tweet=null,
        ?array $auto_fb_post=null,
        ?bool $fb_comments=null,
        ?int $template_id=null
    ) {
        $this->subject_line = $subject_line;
        $this->preview_text = $preview_text;
        $this->title = $title;
        $this->from_name = $from_name;
        $this->reply_to = $reply_to;
        $this->use_conversation = $use_conversation;
        $this->to_name = $to_name;
        $this->folder_id = $folder_id;
        $this->authenticate = $authenticate;
        $this->auto_footer = $auto_footer;
        $this->inline_css = $inline_css;
        $this->auto_tweet = $auto_tweet;
        $this->auto_fb_post = $auto_fb_post;
        $this->fb_comments = $fb_comments;
        $this->template_id = $template_id;
    }
}
