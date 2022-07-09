<?php

namespace Mailchimp\Api\Automations;

use Mailchimp\Api\BaseApi;
use Mailchimp\HttpMethod;

/**
 * Remove subscribers from a classic automation workflow.
 */
class RemovedSubscribers extends BaseApi
{
    /**
     * List subscribers removed from workflow
     *
     * Get information about subscribers who were removed from a classic automation workflow.
     *
     * @param string $workflowId
     * The unique id for the Automation workflow.
     * @return array
     */
    public function getAll(string $workflowId): array
    {
        return $this->mailchimp->call("automations/$workflowId/removed-subscribers");
    }

    /**
     * Get subscriber removed from workflow
     *
     * Get information about a specific subscriber who was removed from a classic automation workflow.
     *
     * @param string $workflowId
     * The unique id for the Automation workflow.
     * @param string $subscriberHash
     * The MD5 hash of the lowercase version of the list member's email address.
     * @return array
     */
    public function getById(string $workflowId, string $subscriberHash): array
    {
        return $this->mailchimp->call("automations/$workflowId/removed-subscribers/$subscriberHash");
    }

    /**
     * Remove subscriber from workflow
     *
     * Remove a subscriber from a specific classic automation workflow. You can remove a subscriber at any point in an
     * automation workflow, regardless of how many emails they've been sent from that workflow. Once they're removed,
     * they can never be added back to the same workflow.
     *
     * @param string $workflowId
     * The unique id for the Automation workflow.
     * @param string $email_address
     * The list member's email address.
     * @return array
     */
    public function remove(string $workflowId, string $email_address): array
    {
        return $this->mailchimp->call(
            "automations/$workflowId/removed-subscribers",
            null,
            compact('email_address'),
            HttpMethod::POST
        );
    }
}
