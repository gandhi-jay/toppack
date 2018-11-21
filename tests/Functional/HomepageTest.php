<?php

namespace Tests\Functional;

class HomepageTest extends BaseTestCase
{
    /**
     * Test that the index route with optional name argument returns a rendered greeting
     */
    public function testGetHomepageWithGreeting()
    {
        $response = $this->runApp('GET', '/hello/name');

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertContains('Hello, name'.PHP_EOL, (string)$response->getBody());
    }
    
}