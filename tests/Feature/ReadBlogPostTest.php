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

    /** @test */
    public function a_user_can_see_a_single_post()
    {
        $this->withoutExceptionHandling();
        $post = create('App\Post');

        $this->get('/post/' . $post->id)
            ->assertSee($post->title)
            ->assertSee($post->body);
    }

    /** @test */
    public function a_user_can_create_a_blog_post()
    {
        $this->withoutExceptionHandling();
        $post = make('App\Post');

        $response = $this->post('/post', $post->toArray());
        $url = $response->headers->get('location');

        $this->get($url)
            ->assertSee($post->title)
            ->assertSee($post->body);
    }

    /** @test */
    public function a_post_should_be_parsed_as_html_from_markdown()
    {
        $post = create('App\Post', ['body' => '# heading']);

        $this->get($post->path())
            ->assertJson([
                'body' => '<h1>heading</h1>'
            ]);
    }
    
    
}
