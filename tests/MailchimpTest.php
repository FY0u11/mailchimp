<?php

namespace Mailchimp\Tests;

use Mailchimp\HttpMethod;
use Mailchimp\Mailchimp;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MailchimpTest extends TestCase
{
    /**
     * @throws ReflectionException
     */
    public function testGetBaseApiUrl_shouldReturnValidUrl()
    {
        $apiKey = 'qazwsxedcrfvtgbyhn';
        $url = PHPUnitUtils::callMethod(new Mailchimp(), 'getBaseApiUrl', [$apiKey]);
        $this->assertEquals('https://us1.api.mailchimp.com/3.0/', $url);

        $apiKey = 'qazwsxedcrfvtgbyhn-us10';
        $url = PHPUnitUtils::callMethod(new Mailchimp(), 'getBaseApiUrl', [$apiKey]);
        $this->assertEquals('https://us10.api.mailchimp.com/3.0/', $url);
    }

    /**
     * @throws ReflectionException
     */
    public function testGetHttpClient_shouldReturnHttpClient()
    {
        $apiKey = 'qazwsxedcrfvtgbyhn';
        $httpClient = PHPUnitUtils::callMethod(new Mailchimp(), 'getHttpClient', [$apiKey]);
        $this->assertInstanceOf(HttpClientInterface::class, $httpClient);
    }

    public function testInitialize_shouldRunWithoutErrors()
    {
        $apiKey = 'qazwsxedcrfvtgbyhn';
        $mailchimp = new Mailchimp();
        $mailchimp->initialize($apiKey);
        $this->assertTrue(true);
    }

    public function testCall_passValidArgs_shouldCallRequestMethodWithProperArguments()
    {
        $urn = 'get-users';
        $us = 'us7';
        $queryParams = ['user_id' => '1022'];
        $bodyParams = ['name' => 'John', 'admin' => true];
        list($httpClientMock, $mailchimpMock) = $this->getMocks();

        $httpClientMock->expects($this->once())->method('request')->with(
            HttpMethod::POST,
            "https://$us.api.mailchimp.com/3.0/$urn?user_id=1022",
            ['body' => json_encode($bodyParams)]
        );

        $mailchimpMock->initialize("qazwsxedcrfvtgbyhn-$us");
        $this->assertEquals([], $mailchimpMock->call($urn, $queryParams, $bodyParams, HttpMethod::POST));
    }

    public function testCall_requestThrowsException_shouldReturnArrayWithError()
    {
        $errorMsg = 'Error with your request';
        list($httpClientMock, $mailchimpMock) = $this->getMocks();

        $exception = $this->getMockBuilder(ClientExceptionInterface::class)->getMock();
        $httpClientMock->method('request')->willThrowException(new $exception($errorMsg));

        $mailchimpMock->initialize('qazwsxedcrfvtgbyhn');
        $this->assertEquals(['error' => $errorMsg], $mailchimpMock->call('test'));
    }

    /**
     * @return array [HttpClient, Mailchimp]
     */
    protected function getMocks(): array
    {
        $httpClientMock = $this->getMockBuilder(HttpClientInterface::class)
            ->getMock();
        $mailchimpMock = $this->getMockBuilder(Mailchimp::class)
            ->onlyMethods(['getHttpClient'])
            ->getMock();
        $mailchimpMock->method('getHttpClient')->willReturn($httpClientMock);

        return [$httpClientMock, $mailchimpMock];
    }
}
