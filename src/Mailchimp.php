<?php

namespace Mailchimp;

use Mailchimp\Api\AccountExports;
use Symfony\Component\HttpClient\HttpClient;
use Mailchimp\Api\Root;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Mailchimp implements MailchimpInterface
{
    protected const BASE_API_URL = 'https://api.mailchimp.com/3.0';

    /**
     * @var string
     */
    private string $_url;

    /**
     * @var Helper
     */
    protected Helper $helper;

    /**
     * @var HttpClientInterface
     */
    private HttpClientInterface $_client;

    /**
     * @var Root
     */
    public Root $root;

    /**
     * @var AccountExports
     */
    public AccountExports $accountExports;

    public function __construct()
    {
        $this->helper = new Helper();
        $this->root = new Root($this);
        $this->accountExports = new AccountExports($this);
    }

    /**
     * @inheritdoc
     */
    public function initialize(string $apiKey)
    {
        $this->_init($apiKey);
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
        $queryString = $this->helper->buildQueryString($queryParams);
        $url = $this->_url . $urn . $queryString;
        $options = [];
        if (!is_null($bodyParams)) {
            $options['body'] = json_encode($bodyParams);
        }
        try {
            return $this->_client->request($method, $url, $options)->toArray();
        } catch (ClientExceptionInterface $clientException) {
            return $clientException->getResponse()->toArray(false);
        } catch (\Throwable $throwable) {
            return [
                'error' => $throwable->getMessage(),
            ];
        }
    }

    /**
     * @param $apiKey
     * @return void
     */
    private function _init($apiKey)
    {
        $this->_client = $this->getHttpClient($apiKey);
        $this->_url = $this->getBaseApiUrl($apiKey);
    }

    /**
     * @param string $apiKey
     * @return HttpClientInterface
     */
    protected function getHttpClient(string $apiKey): HttpClientInterface
    {
        return HttpClient::create([
            'auth_basic' => "noname:$apiKey"
        ]);
    }

    /**
     * @param string $apiKey
     * @return string
     */
    protected function getBaseApiUrl(string $apiKey): string
    {
        $dc = 'us1';
        if (strstr($apiKey, '-')){
            list($key, $dc) = explode('-', $apiKey, 2);
        }
        $url = str_replace('https://api', 'https://' . $dc . '.api', self::BASE_API_URL);

        return rtrim($url, '/') . '/';
    }
}
