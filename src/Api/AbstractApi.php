<?php

namespace Mailchimp\Api;

use Mailchimp\MailchimpInterface;

class AbstractApi implements AbstractApiInterface
{
    /**
     * @var MailchimpInterface
     */
    protected MailchimpInterface $mailchimp;

    /**
     * @param MailchimpInterface $mailchimp
     */
    public function __construct(MailchimpInterface $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }
}
