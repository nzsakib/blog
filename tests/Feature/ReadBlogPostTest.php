<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadBlogPostTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function a_user_can_see_all_post()
    {
        $this->withoutExceptionHandling();
        $post = create('App\Post');

        $response = $this->get('/');

        $response->assertSee($post->title);
    }
}
