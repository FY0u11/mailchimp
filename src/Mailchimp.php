<?php

namespace Mailchimp;

use Mailchimp\Api\AccountExports;
use Mailchimp\Api\AuthorizedApps;
use Mailchimp\Api\Automations\Automations;
use Mailchimp\Api\BatchOperations\BatchOperations;
use Mailchimp\Api\BatchWebhooks;
use Mailchimp\Api\CampaignFolders;
use Mailchimp\Api\Root;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Mailchimp implements MailchimpInterface
{
    protected const BASE_API_URL = 'https://api.mailchimp.com/3.0';
    protected const USER_AGENT = 'Ebizmart-MailChimp-PHP/3.0.0';

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
     * @var Root The API root resource links to all other resources available in the API. Calling the root directory
     *           also returns details about the Mailchimp user account.
     */
    public Root $root;

    /**
     * @var AccountExports Generate a new export or download a finished export.
     */
    public AccountExports $accountExports;

    /**
     * @var AuthorizedApps Manage registered, connected apps for your Mailchimp account with the Authorized Apps endpoints.
     */
    public AuthorizedApps $authorizedApps;

    /**
     * @var Automations Mailchimp's classic automations feature lets you build a series of emails that send to
     *                  subscribers when triggered by a specific date, activity, or event. Use the API to manage
     *                  Automation workflows, emails, and queues. Does not include Customer Journeys.
     */
    public Automations $automations;

    /**
     * @var BatchOperations Use batch operations to complete multiple operations with a single call.
     */
    public BatchOperations $batchOperations;

    /**
     * @var BatchWebhooks Manage webhooks for batch operations.
     */
    public BatchWebhooks $batchWebhooks;

    /**
     * @var CampaignFolders Organize your campaigns using folders.
     */
    public CampaignFolders $campaignFolders;

    /**
     * Mailchimp Marketing API
     */
    public function __construct()
    {
        $this->helper = new Helper();
        $this->root = new Root($this);
        $this->accountExports = new AccountExports($this);
        $this->authorizedApps = new AuthorizedApps($this);
        $this->automations = new Automations($this);
        $this->batchOperations = new BatchOperations($this);
        $this->batchWebhooks = new BatchWebhooks($this);
        $this->campaignFolders = new CampaignFolders($this);
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
            $options['body'] = json_encode($bodyParams, JSON_FORCE_OBJECT);
        }
        try {
            return $this->_client->request($method, $url, $options)->toArray();
        } catch (ClientExceptionInterface $clientException) {
            return $clientException->getResponse()->toArray(false);
        } catch (\Throwable $throwable) {
            if ($throwable->getMessage() === 'Response body is empty.') {
                return [];
            }
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
            'auth_basic' => "noname:$apiKey",
            'headers' => [
                'User-Agent' => self::USER_AGENT,
            ]
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
