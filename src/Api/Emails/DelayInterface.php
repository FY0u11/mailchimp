<?php

namespace Mailchimp\Api\Emails;

interface DelayInterface
{
    public const TYPE_NOW = 'now';
    public const TYPE_DAY = 'day';
    public const TYPE_HOUR = 'hour';
    public const TYPE_WEEK = 'week';

    public const DIRECTION_AFTER = 'after';

    public const ACTION_SIGNUP = 'signup';
    public const ACTION_ECOMM_ABANDONED_BROWSE = 'ecomm_abandoned_browse';
    public const ACTION_ECOMM_ABANDONED_CART = 'ecomm_abandoned_cart';
}
