<?php

namespace Mailchimp\Api\Automations;

/**
 * Trigger settings for the Automation.
 */
class TriggerSettings extends \Mailchimp\Api\BaseObject
{
    public const WORKFLOW_TYPE_ABANDONED_CART = 'abandonedCart';

    /**
     * @var string The type of Automation workflow. Currently, only supports 'abandonedCart'.
     */
    public string $workflow_type;

    /**
     * @param string $workflow_type The type of Automation workflow. Currently, only supports 'abandonedCart'.
     */
    public function __construct(string $workflow_type=self::WORKFLOW_TYPE_ABANDONED_CART)
    {
        $this->workflow_type = $workflow_type;
    }
}
