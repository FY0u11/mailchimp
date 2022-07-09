<?php

namespace Mailchimp\Api\Emails;

use Mailchimp\Api\BaseApi;
use Mailchimp\HttpMethod;

/**
 * Manage individual emails in a classic automation workflow.
 */
class Emails extends BaseApi
{
    /**
     * Get a summary of the emails in a classic automation workflow.
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @return array
     */
    public function getAll(string $workflowId): array
    {
        return $this->mailchimp->call("automations/$workflowId/emails");
    }

    /**
     * Get information about an individual classic automation workflow email.
     *
     * @param string $workflowId      The unique id for the Automation workflow.
     * @param string $workflowEmailId The unique id for the Automation workflow email.
     * @return array
     */
    public function getById(string $workflowId, string $workflowEmailId): array
    {
        return $this->mailchimp->call("automations/$workflowId/emails/$workflowEmailId");
    }

    /**
     * Removes an individual classic automation workflow email. Emails from certain workflow types, including the
     * Abandoned Cart Email (abandonedCart) and Product Retargeting Email (abandonedBrowse) Workflows, cannot be deleted.
     *
     * @param string $workflowId      The unique id for the Automation workflow.
     * @param string $workflowEmailId The unique id for the Automation workflow email.
     * @return array
     */
    public function delete(string $workflowId, string $workflowEmailId): array
    {
        return $this->mailchimp->call(
            "automations/$workflowId/emails/$workflowEmailId",
            null,
            null,
            HttpMethod::DELETE
        );
    }

    /**
     * Update settings for a classic automation workflow email. Only works with workflows of type: abandonedBrowse,
     * abandonedCart, emailFollowup, or singleWelcome.
     *
     * @param string $workflowId      The unique id for the Automation workflow.
     * @param string $workflowEmailId The unique id for the Automation workflow email.
     * @param Delay|null $delay       The delay settings for an automation email.
     * @param Settings|null $settings Settings for the campaign including the email subject, from name, and from
     *                                email address.
     * @return array
     */
    public function update(
        string $workflowId,
        string $workflowEmailId,
        ?Delay $delay=null,
        ?Settings $settings=null
    ): array {
        return $this->mailchimp->call(
            "automations/$workflowId/emails/$workflowEmailId",
            null,
            $this->parseObjectsToArray(get_defined_vars()),
            HttpMethod::PATCH
        );
    }

    /**
     * Start an automated email.
     *
     * @param string $workflowId      The unique id for the Automation workflow.
     * @param string $workflowEmailId The unique id for the Automation workflow email.
     * @return array
     */
    public function start(string $workflowId, string $workflowEmailId): array
    {
        return $this->mailchimp->call(
            "automations/$workflowId/emails/$workflowEmailId/actions/start",
            null,
            null,
            HttpMethod::POST
        );
    }

    /**
     * Pause an automated email.
     *
     * @param string $workflowId      The unique id for the Automation workflow.
     * @param string $workflowEmailId The unique id for the Automation workflow email.
     * @return array
     */
    public function pause(string $workflowId, string $workflowEmailId): array
    {
        return $this->mailchimp->call(
            "automations/$workflowId/emails/$workflowEmailId/actions/pause",
            null,
            null,
            HttpMethod::POST
        );
    }
}
