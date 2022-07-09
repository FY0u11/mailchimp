<?php

namespace Mailchimp\Api;

class BaseObject implements BaseObjectInterface
{
    /**
     * @inheritdoc
     */
    public function toArray(): array
    {
        $array = json_decode(json_encode($this), true);
        foreach ($array as $key => $value) {
            if (is_null($value)) {
                unset($array[$key]);
            }
        }
        return $array;
    }
}
