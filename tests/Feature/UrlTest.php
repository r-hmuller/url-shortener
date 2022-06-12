<?php

namespace Tests\Feature;

use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlTest extends TestCase
{
    public function test_it_should_redirect_and_have_status_302_when_accessing_valid_post()
    {
        $url = Url::inRandomOrder()->first();
        $response = $this->get('/' . $url->shorten_url);
        $response->assertStatus(302);
    }

    public function test_it_should_have_status_404_when_accessing_invalid_post()
    {
        $response = $this->get('/nao-existe');
        $response->assertStatus(404);
    }

    public function test_it_should_return_the_corrects_stats()
    {
        $url = Url::inRandomOrder()->first();
        $weeklyStats = $url->clicks->count();
        $response = $this->get("/{$url->shorten_url}/stats");
        $response->assertStatus(200);
        $this->assertEquals($weeklyStats, $response['weekly']);
    }
}
