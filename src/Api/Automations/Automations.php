<?php

namespace Mailchimp\Api\Automations;

use Mailchimp\Api\Automations\Emails\Emails;
use Mailchimp\Api\BaseApi;
use Mailchimp\HttpMethod;
use Mailchimp\MailchimpInterface;

/**
 * Mailchimp's classic automations feature lets you build a series of emails that send to subscribers when triggered by
 * a specific date, activity, or event. Use the API to manage Automation workflows, emails, and queues. Does not
 * includeCustomer Journeys.
 */
class Automations extends BaseApi implements AutomationsInterface
{
    /**
     * @var Emails Manage individual emails in a classic automation workflow.
     */
    public Emails $emails;

    /**
     * @var Queue Manage list member queues for classic automation emails.
     */
    public Queue $queue;

    /**
     * @var RemovedSubscribers Remove subscribers from a classic automation workflow..
     */
    public RemovedSubscribers $removedSubscribers;

    /**
     * Mailchimp's classic automations feature lets you build a series of emails that send to subscribers when triggered
     * by a specific date, activity, or event. Use the API to manage Automation workflows, emails, and queues. Does not
     * includeCustomer Journeys.
     *
     * @param MailchimpInterface $mailchimp
     */
    public function __construct(MailchimpInterface $mailchimp)
    {
        parent::__construct($mailchimp);

        $this->emails = new Emails($mailchimp);
        $this->queue = new Queue($mailchimp);
        $this->removedSubscribers = new RemovedSubscribers($mailchimp);
    }

    /**
     * List automations
     *
     * Get a summary of an account's classic automations.
     *
     * @param array|null $fields              A comma-separated list of fields to return. Reference parameters of
     *                                        sub-objects with dot notation.
     * @param array|null $exclude_fields      A comma-separated list of fields to exclude. Reference parameters of
     *                                        sub-objects with dot notation.
     * @param int|null $count                 The number of records to return. Default value is 10. Maximum value is 1000.
     * @param int|null $offset                Used for pagination, this is the number of records from a collection to
     *                                        skip. Default value is 0.
     * @param string|null $before_create_time Restrict the response to automations created before this time. Uses the
     *                                        ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * @param string|null $since_create_time  Restrict the response to automations created after this time. Uses the
     *                                        ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * @param string|null $before_start_time  Restrict the response to automations started before this time. Uses the
     *                                        ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * @param string|null $since_start_time   Restrict the response to automations started after this time. Uses the
     *                                        ISO 8601 time format: 2015-10-21T15:41:36+00:00.
     * @param string|null $status             Restrict the results to automations with the specified status.
     *                                        Possible values: "save", "paused", or "sending".
     * @return array
     */
    public function getAll(
        ?array $fields=null,
        ?array $exclude_fields=null,
        ?int $count=null,
        ?int $offset=null,
        ?string $before_create_time=null,
        ?string $since_create_time=null,
        ?string $before_start_time=null,
        ?string $since_start_time=null,
        ?string $status=null
    ): array {
        return $this->mailchimp->call(
            'automations',
            get_defined_vars()
        );
    }

    /**
     * Get automation info
     *
     * Get a summary of an individual classic automation workflow's settings and content. The trigger_settings object
     * returns information for the first email in the workflow.
     *
     * @param string $workflowId         The unique id for the Automation workflow.
     * @param array|null $fields         A comma-separated list of fields to return. Reference parameters of
     *                                   sub-objects with dot notation.
     * @param array|null $exclude_fields A comma-separated list of fields to exclude. Reference parameters of
     *                                   sub-objects with dot notation.
     * @return array
     */
    public function getById(string $workflowId, ?array $fields=null, ?array $exclude_fields=null): array
    {
        return $this->mailchimp->call(
            "automations/$workflowId",
            compact('fields', 'exclude_fields')
        );
    }

    /**
     * Add automation
     *
     * Create a new classic automation in your Mailchimp account.
     *
     * @param Recipients $recipients            List settings for the Automation.
     * @param TriggerSettings $trigger_settings Trigger settings for the Automation.
     * @param Settings|null $settings           The settings for the Automation workflow.
     * @return array
     */
    public function add(Recipients $recipients, TriggerSettings $trigger_settings, Settings $settings=null): array
    {
        return $this->mailchimp->call(
            'automations',
            null,
            $this->parseObjectsToArray(get_defined_vars()),
            HttpMethod::POST
        );
    }

    /**
     * Start automation emails
     *
     * Start all emails in a classic automation workflow.
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @return array
     */
    public function start(string $workflowId): array
    {
        return $this->mailchimp->call(
            "automations/$workflowId/actions/start-all-emails",
            null,
            null,
            HttpMethod::POST
        );
    }

    /**
     * Pause automation emails
     *
     * Pause all emails in a specific classic automation workflow.
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @return array
     */
    public function pause(string $workflowId): array
    {
        return $this->mailchimp->call(
            "automations/$workflowId/actions/pause-all-emails",
            null,
            null,
            HttpMethod::POST
        );
    }

    /**
     * Archive automation
     *
     * Archiving will permanently end your automation and keep the report data. You’ll be able to replicate your
     * archived automation, but you can’t restart it.
     *
     * @param string $workflowId The unique id for the Automation workflow.
     * @return array
     */
    public function archive(string $workflowId): array
    {
        return $this->mailchimp->call(
            "automations/$workflowId/actions/archive",
            null,
            null,
            HttpMethod::POST
        );
    }
}
