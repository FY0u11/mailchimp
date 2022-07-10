<?php

namespace Mailchimp\Api\Campaigns;

use Mailchimp\Api\BaseObject;

/**
 * The days of the week to send a daily RSS Campaign.
 */
class DailySend extends BaseObject
{
    /**
     * @var bool|null
     * Sends the daily RSS Campaign on Sundays.
     */
    public ?bool $sunday;

    /**
     * @var bool|null
     * Sends the daily RSS Campaign on Mondays.
     */
    public ?bool $monday;

    /**
     * @var bool|null
     * Sends the daily RSS Campaign on Tuesdays.
     */
    public ?bool $tuesday;

    /**
     * @var bool|null
     * Sends the daily RSS Campaign on Wednesdays.
     */
    public ?bool $wednesday;

    /**
     * @var bool|null
     * Sends the daily RSS Campaign on Thursdays.
     */
    public ?bool $thursday;

    /**
     * @var bool|null
     * Sends the daily RSS Campaign on Fridays.
     */
    public ?bool $friday;

    /**
     * @var bool|null
     * Sends the daily RSS Campaign on Saturdays.
     */
    public ?bool $saturday;

    /**
     * The days of the week to send a daily RSS Campaign.
     *
     * @param bool|null $sunday
     * Sends the daily RSS Campaign on Sundays.
     * @param bool|null $monday
     * Sends the daily RSS Campaign on Mondays.
     * @param bool|null $tuesday
     * Sends the daily RSS Campaign on Tuesdays.
     * @param bool|null $wednesday
     * Sends the daily RSS Campaign on Wednesdays.
     * @param bool|null $thursday
     * Sends the daily RSS Campaign on Thursdays.
     * @param bool|null $friday
     * Sends the daily RSS Campaign on Fridays.
     * @param bool|null $saturday
     * Sends the daily RSS Campaign on Saturdays.
     */
    public function __construct(
        ?bool $sunday=null,
        ?bool $monday=null,
        ?bool $tuesday=null,
        ?bool $wednesday=null,
        ?bool $thursday=null,
        ?bool $friday=null,
        ?bool $saturday=null
    ) {
        $this->sunday = $sunday;
        $this->monday = $monday;
        $this->tuesday = $tuesday;
        $this->wednesday = $wednesday;
        $this->thursday = $thursday;
        $this->friday = $friday;
        $this->saturday = $saturday;
    }
}
