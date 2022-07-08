<?php

namespace Mailchimp\Tests;

use Mailchimp\Helper;
use Mailchimp\HelperInterface;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    /**
     * @var HelperInterface
     */
    protected $helper;

    /**
     * @param string|null $name
     * @param array $data
     * @param string $dataName
     */
    public function __construct(
        ?string $name = null,
        array $data = [],
        $dataName = ''
    ) {
        parent::__construct($name, $data, $dataName);

        $this->helper = new Helper();
    }

    public function testBuildQueryString_passNull_returnEmptyString()
    {
        $queryString = $this->helper->buildQueryString(null);
        $this->assertIsString($queryString);
        $this->assertEmpty($queryString);
    }

    public function testBuildQueryString_passEmptyArray_returnEmptyString()
    {
        $queryString = $this->helper->buildQueryString([]);
        $this->assertIsString($queryString);
        $this->assertEmpty($queryString);
    }

    public function testBuildQueryString_passQueryArray_returnValidQueryString()
    {
        $queryString = $this->helper->buildQueryString(['name' => null]);
        $this->assertEquals('', $queryString);

        $queryString = $this->helper->buildQueryString(['name' => 'John']);
        $this->assertEquals('?name=John', $queryString);

        $queryString = $this->helper->buildQueryString(['name' => 'John', 'age' => 25]);
        $this->assertEquals('?name=John&age=25', $queryString);

        $queryString = $this->helper->buildQueryString(['name' => 'John', 'age' => null]);
        $this->assertEquals('?name=John', $queryString);

        $queryString = $this->helper->buildQueryString(['name' => 'John', 'male' => true]);
        $this->assertEquals('?name=John&male=1', $queryString);

        $queryString = $this->helper->buildQueryString(['name' => 'John', 'hobbies' => []]);
        $this->assertEquals('?name=John', $queryString);

        $queryString = $this->helper->buildQueryString(['name' => 'John', 'hobbies' => ['hobby1']]);
        $this->assertEquals('?name=John&hobbies=hobby1', $queryString);

        $queryString = $this->helper->buildQueryString(['name' => 'John', 'hobbies' => ['hobby1', 'hobby2']]);
        $this->assertEquals('?name=John&hobbies=hobby1,hobby2', $queryString);
    }
}
