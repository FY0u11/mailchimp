<?php

namespace Mailchimp;

use Symfony\Component\HttpClient\HttpClient;
use Mailchimp\Api\Root;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Mailchimp implements MailchimpInterface
{
    /**
     * @var string
     */
    private string $_url = 'https://api.mailchimp.com/3.0';

    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $_client;

    /**
     * @var Root
     */
    public Root $root;

    /**
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        $this->root = new Root($this);

        $this->init($apiKey);
    }

    /**
     * @inheritdoc
     */
    public function call(
        $urn,
        $queryParams=null,
        $bodyParams=null,
        $method=HttpMethod::GET
    ): array {
        $queryString = $this->buildQueryString($queryParams);
        $url = $this->_url . $urn . $queryString;
        $options = ['body' => $bodyParams];
        try {
            return $this->_client->request($method, $url, $options)->toArray();
        } catch (ClientExceptionInterface $clientException) {
            return [
                'error' => $clientException->getMessage(),
            ];
        }
    }

    /**
     * @param $apiKey
     * @return void
     */
    protected function init($apiKey)
    {
        $this->initHttpClient($apiKey);
        $this->setBaseApiUrl($apiKey);
    }

    /**
     * @param string $apiKey
     * @return void
     */
    protected function initHttpClient(string $apiKey)
    {
        $this->_client = HttpClient::create([
            'auth_basic' => "noname:$apiKey"
        ]);
    }

    /**
     * @param string $apiKey
     * @return void
     */
    protected function setBaseApiUrl(string $apiKey)
    {
        $dc = 'us1';
        if (strstr($apiKey, '-')){
            list($key, $dc) = explode('-', $apiKey, 2);
            if (!$dc) {
                $dc = 'us1';
            }
        }
        $this->_url = str_replace('https://api', 'https://' . $dc . '.api', $this->_url);
        $this->_url = rtrim($this->_url, '/') . '/';
    }

    /**
     * @param array|null $queryParams
     * @return string
     */
    protected function buildQueryString(?array $queryParams): string
    {
        if (is_null($queryParams) || count($queryParams) === 0) {
            return '';
        }
        $paramsJoined = [];
        foreach ($queryParams as $key => $value) {
            if (is_null($value) || count($value) === 0) {
                continue;
            }
            $paramsJoined[] = "$key=" . (is_array($value) ? implode(',', $value) : $value);
        }
        if (empty($paramsJoined)) {
            return '';
        }
        return '?' . implode('&', $paramsJoined);
    }
}
