<?php

namespace Mailchimp\Api\Campaigns;

use Mailchimp\Api\BaseApi;
use Mailchimp\Api\Campaigns\Content\Content;
use Mailchimp\HttpMethod;
use Mailchimp\MailchimpInterface;

/**
 * Campaigns are how you send emails to your Mailchimp list. Use the Campaigns API calls to manage campaigns in your
 * Mailchimp account.
 */
class Campaigns extends BaseApi implements CampaignsInterface
{
    /**
     * @var Content
     * Manage the HTML, plain-text, and template content for your Mailchimp campaigns.
     */
    public Content $content;

    /**
     * Campaigns are how you send emails to your Mailchimp list. Use the Campaigns API calls to manage campaigns in your
     * Mailchimp account.
     *
     * @param MailchimpInterface $mailchimp
     */
    public function __construct(MailchimpInterface $mailchimp)
    {
        parent::__construct($mailchimp);

        $this->content = new Content($mailchimp);
    }

    /**
     * List campaigns
     *
     * Get all campaigns in an account.
     *
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @param int|null $count
     * The number of records to return. Default value is 10. Maximum value is 1000.
     * @param int|null $offset
     * Used for pagination, this is the number of records from a collection to skip. Default value is 0.
     * @param string|null $type
     * The campaign type. Possible values: "regular", "plaintext", "absplit", "rss", or "variate".
     * @param string|null $status
     * The status of the campaign. Possible values: "save", "paused", "schedule", "sending",  or "sent".
     * @param string|null $before_send_time
     * Restrict the response to campaigns sent before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * @param string|null $since_send_time
     * Restrict the response to campaigns sent after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * @param string|null $before_create_time
     * Restrict the response to campaigns created before the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * @param string|null $since_create_time
     * Restrict the response to campaigns created after the set time. Uses ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * @param string|null $list_id
     * The unique id for the list.
     * @param string|null $folder_id
     * The unique folder id.
     * @param string|null $member_id
     * Retrieve campaigns sent to a particular list member. Member ID is The MD5 hash of the lowercase version of the
     * list member’s email address.
     * @param string|null $sort_field
     * Returns files sorted by the specified field. Possible values: "create_time" or "send_time".
     * @param string|null $sort_dir
     * Determines the order direction for sorted results. Possible values: "ASC" or "DESC".
     * @return array
     */
    public function getAll(
        ?array $fields=null,
        ?array $exclude_fields=null,
        ?int $count=null,
        ?int $offset=null,
        ?string $type=null,
        ?string $status=null,
        ?string $before_send_time=null,
        ?string $since_send_time=null,
        ?string $before_create_time=null,
        ?string $since_create_time=null,
        ?string $list_id=null,
        ?string $folder_id=null,
        ?string $member_id=null,
        ?string $sort_field=null,
        ?string $sort_dir=null
    ): array {
        return $this->mailchimp->call(
            'campaigns',
            get_defined_vars()
        );
    }

    /**
     * Get campaign info
     *
     * Get information about a specific campaign.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function getById(string $campaignId, ?array $fields=null, ?array $exclude_fields=null): array
    {
        return $this->mailchimp->call(
            "campaigns/$campaignId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Add campaign
     *
     * Create a new Mailchimp campaign.
     *
     * @param string $type
     * There are four types of campaigns you can create in Mailchimp. A/B Split campaigns have been deprecated and
     * variate campaigns should be used instead. Possible values: "regular", "plaintext", "absplit", "rss", or "variate".
     * @param Settings|null $settings
     * The settings for your campaign, including subject, from name, reply-to address, and more.
     * @param Recipients|null $recipients
     * List settings for the campaign.
     * @param RssOpts|null $rss_opts
     * RSS options, specific to an RSS campaign.
     * @param VariateSettings|null $variate_settings
     * The settings specific to A/B test campaigns.
     * @param Tracking|null $tracking
     * The tracking options for a campaign.
     * @param SocialCard|null $social_cart
     * The preview for the campaign, rendered by social networks like Facebook and Twitter.
     * @param string|null $content_type
     * How the campaign's content is put together. The old drag and drop editor uses 'template' while the new editor
     * uses 'multichannel'. Defaults to template. Possible values: "template" or "multichannel".
     * @return array
     */
    public function add(
        string $type,
        ?Settings $settings=null,
        ?Recipients $recipients=null,
        ?RssOpts $rss_opts=null,
        ?VariateSettings $variate_settings=null,
        ?Tracking $tracking=null,
        ?SocialCard $social_cart=null,
        string $content_type=null
    ): array {
        return $this->mailchimp->call(
            'campaigns',
            null,
            $this->toArray(get_defined_vars()),
            HttpMethod::POST
        );
    }

    /**
     * Update campaign settings
     *
     * Update some or all of the settings for a specific campaign.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @param Settings $settings
     * The settings for your campaign, including subject, from name, reply-to address, and more.
     * @param Recipients|null $recipients
     * List settings for the campaign.
     * @param RssOpts|null $rssOpts
     * RSS options for a campaign.
     * @param VariateSettings|null $variate_settings
     * The settings specific to A/B test campaigns.
     * @param Tracking|null $tracking
     * The tracking options for a campaign.
     * @param SocialCard|null $social_cart
     * The preview for the campaign, rendered by social networks like Facebook and Twitter.
     * @return array
     */
    public function update(
        string $campaignId,
        Settings $settings,
        ?Recipients $recipients=null,
        ?RssOpts $rssOpts=null,
        ?VariateSettings $variate_settings=null,
        ?Tracking $tracking=null,
        ?SocialCard $social_cart=null
    ): array {
        return $this->mailchimp->call(
            "campaigns/$campaignId",
            null,
            $this->toArray(get_defined_vars(), ['campaignId']),
            HttpMethod::PATCH
        );
    }

    /**
     * Delete campaign
     *
     * Remove a campaign from your Mailchimp account.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @return array
     */
    public function delete(string $campaignId): array
    {
        return $this->mailchimp->call(
            "campaigns/$campaignId",
            null,
            null,
            HttpMethod::DELETE
        );
    }

    /**
     * Cancel campaign
     *
     * Cancel a Regular or Plain-Text Campaign after you send, before all of your recipients receive it. This feature is
     * included with Mailchimp Pro.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @return array
     */
    public function cancel(string $campaignId): array
    {
        return $this->mailchimp->call(
            "campaigns/$campaignId/actions/cancel-send",
            null,
            null,
            HttpMethod::POST
        );
    }

    /**
     * Send campaign
     *
     * Send a Mailchimp campaign. For RSS Campaigns, the campaign will send according to its schedule. All other
     * campaigns will send immediately.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @return array
     */
    public function send(string $campaignId): array
    {
        return $this->mailchimp->call(
            "campaigns/$campaignId/actions/send",
            null,
            null,
            HttpMethod::POST
        );
    }

    /**
     * Schedule campaign
     *
     * Schedule a campaign for delivery. If you're using Multivariate Campaigns to test send times or sending RSS
     * Campaigns, use the send action instead.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @param string $schedule_time
     * The UTC date and time to schedule the campaign for delivery in ISO 8601 format. Campaigns may only be scheduled
     * to send on the quarter-hour (:00, :15, :30, :45).
     * @param BatchDelivery|null $batchDelivery
     * Choose whether the campaign should use Batch Delivery. Cannot be set to true for campaigns using Timewarp.
     * @param bool|null $timewarp
     * Choose whether the campaign should use Timewarp when sending. Campaigns scheduled with Timewarp are localized
     * based on the recipients' time zones. For example, a Timewarp campaign with a schedule_time of 13:00 will be sent
     * to each recipient at 1:00pm in their local time. Cannot be set to true for campaigns using Batch Delivery.
     * @return array
     */
    public function schedule(
        string $campaignId,
        string $schedule_time,
        ?BatchDelivery $batchDelivery=null,
        ?bool $timewarp=null
    ): array {
        return $this->mailchimp->call(
            "campaigns/$campaignId/actions/schedule",
            null,
            $this->toArray(get_defined_vars(), ['campaignId']),
            HttpMethod::POST
        );
    }

    /**
     * Unschedule campaign
     *
     * Unschedule a scheduled campaign that hasn't started sending.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @return array
     */
    public function unschedule(string $campaignId): array
    {
        return $this->mailchimp->call(
            "campaigns/$campaignId/actions/unschedule",
            null,
            null,
            HttpMethod::POST
        );
    }

    /**
     * Pause rss campaign
     *
     * Pause an RSS-Driven campaign.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @return array
     */
    public function pause(string $campaignId): array
    {
        return $this->mailchimp->call(
            "campaigns/$campaignId/actions/pause",
            null,
            null,
            HttpMethod::POST
        );
    }

    /**
     * Resume rss campaign
     *
     * Resume an RSS-Driven campaign.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @return array
     */
    public function resume(string $campaignId): array
    {
        return $this->mailchimp->call(
            "campaigns/$campaignId/actions/resume",
            null,
            null,
            HttpMethod::POST
        );
    }

    /**
     * Replicate campaign
     *
     * Replicate a campaign in saved or send status.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @return array
     */
    public function replicate(string $campaignId): array
    {
        return $this->mailchimp->call(
            "campaigns/$campaignId/actions/replicate",
            null,
            null,
            HttpMethod::POST
        );
    }

    /**
     * Send test email
     *
     * Send a test email.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @param array $test_emails
     * An array of email addresses to send the test email to.
     * @param string $send_type
     * Choose the type of test email to send. Possible values: "html" or "plaintext".
     * @return array
     */
    public function sendTestEmail(string $campaignId, array $test_emails, string $send_type): array
    {
        return $this->mailchimp->call(
            "campaigns/$campaignId/actions/test",
            null,
            $this->toArray(get_defined_vars(), ['campaignId']),
            HttpMethod::POST
        );
    }

    /**
     * Resend campaign
     *
     * Creates a Resend to Non-Openers version of this campaign. We will also check if this campaign meets the criteria
     * for Resend to Non-Openers campaigns.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @return array
     */
    public function resend(string $campaignId): array
    {
        return $this->mailchimp->call(
            "campaigns/$campaignId/actions/create-resend",
            null,
            null,
            HttpMethod::POST
        );
    }
}
