<?php

namespace Mailchimp\Api\Campaigns\Content;

use Mailchimp\Api\BaseObject;

/**
 * Content options for Multivariate Campaigns. Each content option must provide HTML content and may optionally provide
 * plain text. For campaigns not testing content, only one object should be provided.
 */
class VariateContents extends BaseObject
{
    /**
     * @var Archive|null
     * Available when uploading an archive to create campaign content. The archive should include all campaign content
     * and images. Learn more.
     */
    public ?Archive $archive;

    /**
     * @var Template|null
     * Use this template to generate the HTML content for the campaign.
     */
    public ?Template $template;

    /**
     * @var string|null
     * The label used to identify the content option.
     */
    public ?string $content_label;

    /**
     * @var string|null
     * The plain-text portion of the campaign. If left unspecified, we'll generate this automatically.
     */
    public ?string $plain_text;

    /**
     * @var string|null
     * The raw HTML for the campaign.
     */
    public ?string $html;

    /**
     * @var string|null
     * When importing a campaign, the URL for the HTML.
     */
    public ?string $url;

    /**
     * Content options for Multivariate Campaigns. Each content option must provide HTML content and may optionally
     * provide plain text. For campaigns not testing content, only one object should be provided.
     *
     * @param Archive|null $archive
     * Available when uploading an archive to create campaign content. The archive should include all campaign content
     * and images. Learn more.
     * @param Template|null $template
     * Use this template to generate the HTML content for the campaign.
     * @param string|null $content_label
     * The label used to identify the content option.
     * @param string|null $plain_text
     * The plain-text portion of the campaign. If left unspecified, we'll generate this automatically.
     * @param string|null $html
     * The raw HTML for the campaign.
     * @param string|null $url
     * When importing a campaign, the URL for the HTML.
     */
    public function __construct(
        ?Archive $archive=null,
        ?Template $template=null,
        ?string $content_label=null,
        ?string $plain_text=null,
        ?string $html=null,
        ?string $url=null
    ) {
        $this->archive = $archive;
        $this->template = $template;
        $this->content_label = $content_label;
        $this->plain_text = $plain_text;
        $this->html = $html;
        $this->url = $url;
    }
}
