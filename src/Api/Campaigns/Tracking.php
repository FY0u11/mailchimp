<?php

namespace Mailchimp\Api\Campaigns;

use Mailchimp\Api\BaseObject;

/**
 * The tracking options for a campaign.
 */
class Tracking extends BaseObject
{
    /**
     * @var bool|null
     * Whether to track opens. Defaults to true. Cannot be set to false for variate campaigns.
     */
    public ?bool $opens;

    /**
     * @var bool|null
     * Whether to track clicks in the HTML version of the campaign. Defaults to true. Cannot be set to false for variate
     * campaigns.
     */
    public ?bool $html_clicks;

    /**
     * @var bool|null
     * Whether to track clicks in the plain-text version of the campaign. Defaults to true. Cannot be set to false for
     * variate campaigns.
     */
    public ?bool $text_clicks;

    /**
     * @var bool|null
     * Whether to enable e-commerce tracking.
     */
    public ?bool $ecomm360;

    /**
     * @var string|null
     * The custom slug for Google Analytics tracking (max of 50 bytes).
     */
    public ?string $google_analytics;

    /**
     * @var string|null
     * The custom slug for ClickTale tracking (max of 50 bytes).
     */
    public ?string $clicktale;

    /**
     * The tracking options for a campaign.
     *
     * @param bool|null $opens
     * Whether to track opens. Defaults to true. Cannot be set to false for variate campaigns.
     * @param bool|null $html_clicks
     * Whether to track clicks in the HTML version of the campaign. Defaults to true. Cannot be set to false for variate
     * campaigns.
     * @param bool|null $text_clicks
     * Whether to track clicks in the plain-text version of the campaign. Defaults to true. Cannot be set to false for
     * variate campaigns.
     * @param bool|null $ecomm360
     * Whether to enable e-commerce tracking.
     * @param string|null $google_analytics
     * The custom slug for Google Analytics tracking (max of 50 bytes).
     * @param string|null $clicktale
     * The custom slug for ClickTale tracking (max of 50 bytes).
     */
    public function __construct(
        ?bool $opens=null,
        ?bool $html_clicks=null,
        ?bool $text_clicks=null,
        ?bool $ecomm360=null,
        ?string $google_analytics=null,
        ?string $clicktale=null
    ) {
        $this->opens = $opens;
        $this->html_clicks = $html_clicks;
        $this->text_clicks = $text_clicks;
        $this->ecomm360 = $ecomm360;
        $this->google_analytics = $google_analytics;
        $this->clicktale = $clicktale;
    }
}
