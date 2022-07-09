<?php

namespace Mailchimp\Api\Automations;

use Mailchimp\Api\BaseObject;

/**
 * Trigger settings for the Automation.
 */
class TriggerSettings extends BaseObject implements TriggerSettingsInterface
{
    /**
     * @var string The type of Automation workflow. Currently, only supports 'abandonedCart'.
     */
    public string $workflow_type;

    /**
     * Trigger settings for the Automation.
     *
     * @param string $workflow_type The type of Automation workflow. Currently, only supports 'abandonedCart'.
     */
    public function __construct(string $workflow_type=self::WORKFLOW_TYPE_ABANDONED_CART)
    {
        $this->workflow_type = $workflow_type;
    }
}
