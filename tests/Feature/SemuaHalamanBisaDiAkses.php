<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SemuaHalamanBisaDiAkses extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home_bisa_diakses(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
