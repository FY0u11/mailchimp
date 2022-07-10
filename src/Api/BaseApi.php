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
     * @param array $properties
     * @param array|null $excludedFields
     * @return array
     */
    protected function toArray(array $properties, ?array $excludedFields=null): array
    {
        $arrayToReturn = [];
        $withExcludedFields = !empty($excludedFields);
        foreach ($properties as $propertyName => $propertyValue) {
            if (is_null($propertyValue)) {
                continue;
            }
            if ($withExcludedFields && in_array($propertyName, $excludedFields)) {
                continue;
            }
            $arrayToReturn[$propertyName] = is_a($propertyValue, BaseObjectInterface::class)
                ? $propertyValue->toArray()
                : $propertyValue;
        }
        return $arrayToReturn;
    }
}
