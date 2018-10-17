<?php

class ApplicationTest extends Bow\Testing\BowTestCase
{
    /**
     * @var string
     */
    protected $base_url = 'http://localhost:5000';

    /**
     * Test Welcome page
     */
    public function testGetWelcome()
    {
        $response = $this->visit('GET', '/todos');

        $response->assertStatus(200)->contentTypeMustBe('application/json');
    }

    public function testIndex()
    {
        $response = $this->visit('GET', '/todos/1');

        $response->assertStatus(200)->contentTypeMustBe('application/json');
    }
}
