<?php

namespace Mailchimp\Api\Campaigns;

use Mailchimp\Api\BaseObject;

/**
 * The schedule for sending the RSS Campaign.
 */
class Schedule extends BaseObject implements ScheduleInterface
{
    /**
     * @var int|null
     * The hour to send the campaign in local time. Acceptable hours are 0-23. For example, '4' would be 4am in your
     * account's default time zone.
     */
    public ?int $hour;

    /**
     * @var DailySend|null
     * The days of the week to send a daily RSS Campaign.
     */
    public ?DailySend $daily_send;

    /**
     * @var string|null
     * The day of the week to send a weekly RSS Campaign. Possible values: "sunday", "monday", "tuesday", "wednesday",
     * "thursday", "friday", or "saturday".
     */
    public ?string $weekly_send_day;

    /**
     * @var int|null
     * The day of the month to send a monthly RSS Campaign. Acceptable days are 0-31, where '0' is always the last day
     * of a month. Months with fewer than the selected number of days will not have an RSS campaign sent out that day.
     * For example, RSS Campaigns set to send on the 30th will not go out in February.
     */
    public ?int $monthly_send_date;

    /**
     * The schedule for sending the RSS Campaign.
     *
     * @param int|null $hour
     * The hour to send the campaign in local time. Acceptable hours are 0-23. For example, '4' would be 4am in your
     * account's default time zone.
     * @param DailySend|null $daily_send
     * The days of the week to send a daily RSS Campaign.
     * @param string|null $weekly_send_day
     * The day of the week to send a weekly RSS Campaign. Possible values: "sunday", "monday", "tuesday", "wednesday",
     * "thursday", "friday", or "saturday".
     * @param int|null $monthly_send_date
     * The day of the month to send a monthly RSS Campaign. Acceptable days are 0-31, where '0' is always the last day
     * of a month. Months with fewer than the selected number of days will not have an RSS campaign sent out that day.
     * For example, RSS Campaigns set to send on the 30th will not go out in February.
     */
    public function __construct(
        ?int $hour=null,
        ?DailySend $daily_send=null,
        ?string $weekly_send_day=null,
        ?int $monthly_send_date=null
    ) {
        $this->hour = $hour;
        $this->daily_send = $daily_send;
        $this->weekly_send_day = $weekly_send_day;
        $this->monthly_send_date = $monthly_send_date;
    }
}
