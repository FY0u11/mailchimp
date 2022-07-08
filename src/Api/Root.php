<?php

namespace Mailchimp\Api;

use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class Root extends AbstractApi
{
    /**
     * @param array|null $fields
     * @param array|null $exclude_fields
     * @return array
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function get(array $fields = null, array $exclude_fields = null): array
    {
        return $this->mailchimp->call('', compact('fields', 'exclude_fields'));
    }
}
