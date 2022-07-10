<?php

namespace Mailchimp\Api\Campaigns\Content;

use Mailchimp\Api\BaseApi;
use Mailchimp\HttpMethod;

/**
 * Manage the HTML, plain-text, and template content for your Mailchimp campaigns.
 */
class Content extends BaseApi
{
    /**
     * Get campaign content
     *
     * Get the HTML and plain-text content for a campaign.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @param array|null $fields
     * A comma-separated list of fields to return. Reference parameters of sub-objects with dot notation.
     * @param array|null $exclude_fields
     * A comma-separated list of fields to exclude. Reference parameters of sub-objects with dot notation.
     * @return array
     */
    public function get(string $campaignId, ?array $fields=null, ?array $exclude_fields=null): array
    {
        return $this->mailchimp->call(
            "campaigns/$campaignId/content",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Set campaign content
     *
     * Set the content for a campaign.
     *
     * @param string $campaignId
     * The unique id for the campaign.
     * @param Archive|null $archive
     * Available when uploading an archive to create campaign content. The archive should include all campaign content
     * and images.
     * @param Template|null $template
     * Use this template to generate the HTML content of the campaign.
     * @param string|null $plain_text
     * The plain-text portion of the campaign. If left unspecified, we'll generate this automatically.
     * @param string|null $html
     * The raw HTML for the campaign.
     * @param string|null $url
     * When importing a campaign, the URL where the HTML lives.
     * @param VariateContents|null $variate_contents
     * Content options for Multivariate Campaigns. Each content option must provide HTML content and may optionally
     * provide plain text. For campaigns not testing content, only one object should be provided.
     * @return array
     */
    public function set(
        string $campaignId,
        ?Archive $archive=null,
        ?Template $template=null,
        ?string $plain_text=null,
        ?string $html=null,
        ?string $url=null,
        ?VariateContents $variate_contents=null
    ): array {
        return $this->mailchimp->call(
            "/campaigns/$campaignId/content",
            null,
            $this->toArray(get_defined_vars(), ['campaignId']),
            HttpMethod::PUT
        );
    }
}
