<?php

namespace Mailchimp\Api;

use Mailchimp\MailchimpInterface;

class BaseApi implements BaseApiInterface
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

    /**
     * @inheritdoc
     */
    public function parseObjectsToArray(array $objects): array
    {
        $arrayToReturn = [];
        /** @var BaseObjectInterface|null $objectValue */
        foreach ($objects as $objectName => $objectValue) {
            if (is_null($objectValue)) {
                continue;
            }
            $arrayToReturn[$objectName] = $objectValue->toArray();
        }
        return $arrayToReturn;
    }
}
