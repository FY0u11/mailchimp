<?php

namespace Mailchimp\Api\Campaigns\Content;

use Mailchimp\Api\BaseObject;

/**
 * Use this template to generate the HTML content of the campaign.
 */
class Template extends BaseObject
{
    /**
     * @var int|null
     * The id of the template to use.
     */
    public ?int $id;

    /**
     * @var array|null
     * Content for the sections of the template. Each key should be the unique mc:edit area name from the template.
     * @see https://mailchimp.com/help/create-editable-content-areas-with-mailchimps-template-language/
     */
    public ?array $sections;

    /**
     * Use this template to generate the HTML content of the campaign.
     *
     * @param int|null $id
     * The id of the template to use.
     * @param array|null $sections
     * Content for the sections of the template. Each key should be the unique mc:edit area name from the template.
     * @see https://mailchimp.com/help/create-editable-content-areas-with-mailchimps-template-language/
     */
    public function __construct(?int $id=null, ?array $sections=null)
    {
        $this->id = $id;
        $this->sections = $sections;
    }
}
