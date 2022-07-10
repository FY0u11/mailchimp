<?php

namespace Mailchimp\Api\Campaigns;

use Mailchimp\Api\BaseObject;

/**
 * The settings specific to A/B test campaigns.
 */
class VariateSettings extends BaseObject implements VariateSettingsInterface
{
    /**
     * @var string|null
     * The combination that performs the best. This may be determined automatically by click rate, open rate,
     * or total revenue -- or you may choose manually based on the reporting data you find the most valuable. For
     * Multivariate Campaigns testing send_time, winner_criteria is ignored. For Multivariate Campaigns with 'manual'
     * as the winner_criteria, the winner must be chosen in the Mailchimp web application. Possible values: "opens",
     * "clicks", "manual", or "total_revenue".
     */
    public ?string $winner_criteria;

    /**
     * @var int|null
     * The number of minutes to wait before choosing the winning campaign. The value of wait_time must be greater
     * than 0 and in whole hours, specified in minutes.
     */
    public ?int $wait_time;

    /**
     * @var int|null
     * The percentage of recipients to send the test combinations to, must be a value between 10 and 100.
     */
    public ?int $test_size;

    /**
     * @var array|null
     * The possible subject lines to test. If no subject lines are provided, settings.subject_line will be used.
     */
    public ?array $subject_lines;

    /**
     * @var array|null
     * The possible send times to test. The times provided should be in the format YYYY-MM-DD HH:MM:SS.
     * If send_times are provided to test, the test_size will be set to 100% and winner_criteria will be ignored.
     */
    public ?array $send_times;

    /**
     * @var array|null
     * The possible from names. The number of from_names provided must match the number of reply_to_addresses.
     * If no from_names are provided, settings.from_name will be used.
     */
    public ?array $from_names;

    /**
     * @var array|null
     * The possible reply-to addresses. The number of reply_to_addresses provided must match the number of from_names.
     * If no reply_to_addresses are provided, settings.reply_to will be used.
     */
    public ?array $reply_to_addresses;

    /**
     * @param string|null $winner_criteria
     * The combination that performs the best. This may be determined automatically by click rate, open rate,
     * or total revenue -- or you may choose manually based on the reporting data you find the most valuable. For
     * Multivariate Campaigns testing send_time, winner_criteria is ignored. For Multivariate Campaigns with 'manual'
     * as the winner_criteria, the winner must be chosen in the Mailchimp web application. Possible values: "opens",
     * "clicks", "manual", or "total_revenue".
     * @param int|null $wait_time
     * The number of minutes to wait before choosing the winning campaign. The value of wait_time must be greater
     * than 0 and in whole hours, specified in minutes.
     * @param int|null $test_size
     * The percentage of recipients to send the test combinations to, must be a value between 10 and 100.
     * @param array|null $subject_lines
     * The possible subject lines to test. If no subject lines are provided, settings.subject_line will be used.
     * @param array|null $send_times
     * The possible send times to test. The times provided should be in the format YYYY-MM-DD HH:MM:SS.
     * If send_times are provided to test, the test_size will be set to 100% and winner_criteria will be ignored.
     * @param array|null $from_names
     * The possible from names. The number of from_names provided must match the number of reply_to_addresses.
     * If no from_names are provided, settings.from_name will be used.
     * @param array|null $reply_to_addresses
     * The possible reply-to addresses. The number of reply_to_addresses provided must match the number of from_names.
     * If no reply_to_addresses are provided, settings.reply_to will be used.
     */
    public function __construct(
        ?string $winner_criteria=null,
        ?int $wait_time=null,
        ?int $test_size=null,
        ?array $subject_lines=null,
        ?array $send_times=null,
        ?array $from_names=null,
        ?array $reply_to_addresses=null
    ) {
        $this->winner_criteria = $winner_criteria;
        $this->wait_time = $wait_time;
        $this->test_size = $test_size;
        $this->subject_lines = $subject_lines;
        $this->send_times = $send_times;
        $this->from_names = $from_names;
        $this->reply_to_addresses = $reply_to_addresses;
    }
}
