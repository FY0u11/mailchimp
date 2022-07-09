<?php

namespace Mailchimp\Api\Automations;

use Mailchimp\Api\BaseApi;
use Mailchimp\HttpMethod;

/**
 * Manage list member queues for classic automation emails.
 */
class Queue extends BaseApi
{
    /**
     * List automated email subscribers
     *
     * Get information about a classic automation email queue.
     *
     * @param string $workflowId
     * The unique id for the Automation workflow.
     * @param string $workflowEmailId
     * The unique id for the Automation workflow email.
     * @return array
     */
    public function getAll(string $workflowId, string $workflowEmailId): array
    {
        return $this->mailchimp->call("automations/$workflowId/emails/$workflowEmailId/queue");
    }

    /**
     * Get automated email subscriber
     *
     * Get information about a specific subscriber in a classic automation email queue.
     *
     * @param string $workflowId
     * The unique id for the Automation workflow.
     * @param string $workflowEmailId
     * The unique id for the Automation workflow email.
     * @param string $subscriberHash
     * The MD5 hash of the lowercase version of the list member's email address.
     * @return array
     */
    public function getById(string $workflowId, string $workflowEmailId, string $subscriberHash): array
    {
        return $this->mailchimp->call("automations/$workflowId/emails/$workflowEmailId/queue/$subscriberHash");
    }

    /**
     * Add subscriber to workflow email
     *
     * Manually add a subscriber to a workflow, bypassing the default trigger settings. You can also use this endpoint
     * to trigger a series of automated emails in an API 3.0 workflow type.
     *
     * @param string $workflowId
     * The unique id for the Automation workflow.
     * @param string $workflowEmailId
     * The unique id for the Automation workflow email.
     * @param string $email_address
     * The list member's email address.
     * @return array
     */
    public function add(string $workflowId, string $workflowEmailId, string $email_address): array
    {
        return $this->mailchimp->call(
            "automations/$workflowId/emails/$workflowEmailId/queue",
            null,
            compact('email_address'),
            HttpMethod::POST
        );
    }
}
