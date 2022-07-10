<?php

namespace Mailchimp\Api\Campaigns;

interface CampaignsInterface
{
    public const TYPE_REGULAR = 'regular';
    public const TYPE_PLAINTEXT = 'plaintext';
    public const TYPE_ABSPLIT = 'absplit';
    public const TYPE_RSS = 'rss';
    public const TYPE_VARIATE = 'variate';

    public const STATUS_SAVE = 'save';
    public const STATUS_PAUSED = 'paused';
    public const STATUS_SCHEDULE = 'schedule';
    public const STATUS_SENDING = 'sending';
    public const STATUS_SENT = 'sent';

    public const SORT_FIELD_CREATE_TIME = 'create_time';
    public const SORT_FIELD_SEND_TIME = 'send_time';

    public const SORT_DIR_ASC = 'ASC';
    public const SORT_DIR_DESC = 'DESC';

    public const CONTENT_TYPE_TEMPLATE = 'template';
    public const CONTENT_TYPE_MULTICHANNEL = 'multichannel';

    public const TEST_EMAIL_SEND_TYPE_HTML = 'html';
    public const TEST_EMAIL_SEND_TYPE_PLAINTEXT = 'plaintext';
}
