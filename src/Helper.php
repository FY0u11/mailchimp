<?php

namespace Mailchimp;

class Helper implements HelperInterface
{
    /**
     * @inheritdoc
     */
    public function buildQueryString(?array $queryParams): string
    {
        if (is_null($queryParams) || count($queryParams) === 0) {
            return '';
        }
        $paramsJoined = [];
        foreach ($queryParams as $key => $value) {
            if (is_null($value)) {
                continue;
            }
            if (!is_array($value)) {
                $paramsJoined[] = "$key=$value";
            } else {
                if (empty($value)) {
                    continue;
                }
                $paramsJoined[] = "$key=" . implode(',', $value);
            }
        }
        if (empty($paramsJoined)) {
            return '';
        }
        return '?' . implode('&', $paramsJoined);
    }
}
