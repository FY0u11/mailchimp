<?php

namespace Mailchimp\Api\Campaigns;

use Mailchimp\Api\BaseObject;

/**
 * RSS options, specific to an RSS campaign.
 */
class RssOpts extends BaseObject implements RssOptsInterface
{
    /**
     * @var string|null
     * The URL for the RSS feed.
     */
    public ?string $feed_url;

    /**
     * @var string|null
     * The frequency of the RSS Campaign. Possible values: "daily", "weekly", or "monthly".
     */
    public ?string $frequency;

    /**
     * @var Schedule|null
     * The schedule for sending the RSS Campaign.
     */
    public ?Schedule $schedule;

    /**
     * @var bool|null
     * Whether to add CSS to images in the RSS feed to constrain their width in campaigns.
     */
    public ?bool $constrain_rss_img;

    /**
     * RSS options, specific to an RSS campaign.
     *
     * @param string|null $feed_url
     * The URL for the RSS feed.
     * @param string|null $frequency
     * The frequency of the RSS Campaign. Possible values: "daily", "weekly", or "monthly".
     * @param Schedule|null $schedule
     * The schedule for sending the RSS Campaign.
     * @param bool|null $constrain_rss_img
     * Whether to add CSS to images in the RSS feed to constrain their width in campaigns.
     */
    public function __construct(
        ?string $feed_url=null,
        ?string $frequency=null,
        ?Schedule $schedule=null,
        ?bool $constrain_rss_img=null
    ) {
        $this->feed_url = $feed_url;
        $this->frequency = $frequency;
        $this->schedule = $schedule;
        $this->constrain_rss_img = $constrain_rss_img;
    }
}
