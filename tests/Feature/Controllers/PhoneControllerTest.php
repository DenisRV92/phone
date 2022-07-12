<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;

class PhoneControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPhone()
    {
        $response = $this->get('/phone');
        $response->assertStatus(200);
    }

    public function testEdit()
    {
        $response = $this->get('/phone/4/edit');
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->get('/create');
        $response->assertStatus(200);
    }

    public function testSearch()
    {
        $response = $this->get('/phone/search?number=');
        $response->assertStatus(200);
    }
}
