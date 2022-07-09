<?php

namespace Mailchimp\Api;

interface BaseApiInterface
{
    /**
     * @param array $objects
     * @return array
     */
    public function parseObjectsToArray(array $objects): array;
}
