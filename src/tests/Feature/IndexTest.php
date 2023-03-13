<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Faker\Factory;
use Tests\TestCase;
use App\BigQuestion;


class IndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        parent::setUp(); 
        // ダミーデータの作成
        $Question = factory(BigQuestion::class)->create();
        $response = $this->get('/');
        $response->assertStatus(200);

        $value  = "東京の難読地名クイズ";
        $response->assertSee($value);
        $response->assertSee($Question->name);
    }
}
