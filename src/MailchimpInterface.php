<?php

namespace Mailchimp;

interface MailchimpInterface
{
    /**
     * @param string $apiKey
     */
    public function initialize(string $apiKey);

    /**
     * @param string $urn
     * @param array|null $queryParams
     * @param array|null $bodyParams
     * @param string $method
     * @return array
     */
    public function call(
        string $urn,
        ?array $queryParams=null,
        ?array $bodyParams=null,
        string $method=HttpMethod::GET
    ): array;
}
