<?php

namespace Mailchimp\Api\Campaigns;

use Mailchimp\Api\BaseObject;

/**
 * The preview for the campaign, rendered by social networks like Facebook and Twitter.
 */
class SocialCard extends BaseObject
{
    /**
     * @var string|null
     * The url for the header image for the card.
     */
    public ?string $image_url;

    /**
     * @var string|null
     * A short summary of the campaign to display.
     */
    public ?string $description;

    /**
     * @var string|null
     * The title for the card. Typically, the subject line of the campaign.
     */
    public ?string $title;

    /**
     * The preview for the campaign, rendered by social networks like Facebook and Twitter.
     *
     * @param string|null $image_url
     * The url for the header image for the card.
     * @param string|null $description
     * A short summary of the campaign to display.
     * @param string|null $title
     * The preview for the campaign, rendered by social networks like Facebook and Twitter.
     */
    public function __construct(?string $image_url=null, ?string $description=null, ?string $title=null)
    {
        $this->image_url = $image_url;
        $this->description = $description;
        $this->title = $title;
    }
}
