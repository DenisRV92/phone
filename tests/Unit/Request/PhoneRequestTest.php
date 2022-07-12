<?php

namespace Tests\Feature\Request;

use Tests\TestCase;

class PhoneRequestTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub;
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRequestCreate()
    {
        $response = $this->post(route('phone.add'), [
            'number' => 'qfsq5fq3',
            'name' => 'ingredients',
        ]);
        $response->assertSessionHasErrors();
    }

}