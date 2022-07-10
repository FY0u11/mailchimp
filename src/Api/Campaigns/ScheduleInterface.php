<?php

namespace Mailchimp\Api\Campaigns;

interface ScheduleInterface
{
    public const WEEKLY_SEND_DAY_SUNDAY = 'sunday';
    public const WEEKLY_SEND_DAY_MONDAY = 'monday';
    public const WEEKLY_SEND_DAY_TUESDAY = 'tuesday';
    public const WEEKLY_SEND_DAY_WEDNESDAY = 'wednesday';
    public const WEEKLY_SEND_DAY_THURSDAY = 'thursday';
    public const WEEKLY_SEND_DAY_FRIDAY = 'friday';
    public const WEEKLY_SEND_DAY_SATURDAY = 'saturday';
}
