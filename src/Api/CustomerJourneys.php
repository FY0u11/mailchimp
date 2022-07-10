<?php

namespace Mailchimp\Api;

use Mailchimp\HttpMethod;

/**
 * Manage Customer Journey automated workflows
 */
class CustomerJourneys extends BaseApi
{
    /**
     * Customer Journeys API trigger for a contact
     *
     * A step trigger in a Customer Journey. To use it, create a starting point or step from the Customer Journey
     * builder in the app using the Customer Journeys API condition. We’ll provide a url during the process that
     * includes the {journey_id} and {step_id}. You’ll then be able to use this endpoint to trigger the condition
     * for the posted contact.
     *
     * @param string $journeyId
     * The id for the Journey.
     * @param string $stepId
     * The id for the Step.
     * @param string $email_address
     * The list member's email address.
     * @return array
     */
    public function trigger(string $journeyId, string $stepId, string $email_address): array
    {
        return $this->mailchimp->call(
            "customer-journeys/journeys/$journeyId/steps/$stepId/actions/trigger",
            null,
            ['email_address' => $email_address],
            HttpMethod::POST
        );
    }
}
