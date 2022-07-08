<?php

namespace Mailchimp;

interface HelperInterface
{
    /**
     * @param array|null $queryParams
     * @return string
     */
    public function buildQueryString(?array $queryParams): string;
}
