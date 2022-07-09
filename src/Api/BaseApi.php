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
     * @param array $objects
     * @return array
     */
    protected function parseObjectsToArray(array $objects): array
    {
        $arrayToReturn = [];
        foreach ($objects as $objectName => $objectValue) {
            if (is_null($objectValue) || !is_a($objectValue, BaseObjectInterface::class)) {
                continue;
            }
            /** @var BaseObjectInterface $objectValue */
            $arrayToReturn[$objectName] = $objectValue->toArray();
        }
        return $arrayToReturn;
    }
}
