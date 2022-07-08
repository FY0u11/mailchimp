<?php

namespace Mailchimp;

use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

interface MailchimpInterface
{
    /**
     * @param string $urn
     * @param array|null $queryParams
     * @param array|null $bodyParams
     * @param string $method
     * @return array
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function call(
        string $urn,
        ?array $queryParams=null,
        ?array $bodyParams=null,
        string $method=HttpMethod::GET
    ): array;
}
