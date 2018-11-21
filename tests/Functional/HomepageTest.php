<?php

namespace Tests\Functional;

class HomepageTest extends BaseTestCase
{
    /**
     * Test that the /hello/name route works and gives data.
     */
    public function testHelloName()
    {
        $response = $this->runApp('GET', '/hello/name');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Hello, name'.PHP_EOL, (string)$response->getBody());
    }

    /**
     * Test that the /hello/name/ route works same as /hello/name.
     */
    public function testHelloNameWithTrailingSlash() {
        $requestUri = "/hello/name/";
        $redirectUri = "http://localhost/hello/name";
        $response = $this->runApp('GET', $requestUri);

        $this->assertEquals(301, $response->getStatusCode());
        $this->assertEquals(($response->getHeaders())["Location"][0], $redirectUri);
    }

}