<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class AffiliateDistance extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_route_upload()
    {
        $response = $this->get('/uploadfile');

        $response->assertStatus(200);
    }

    public function test_route_post_db()
    {
        $response = $this->post('/uploadfile');

        $response->assertStatus(200);
    }

}
