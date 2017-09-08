<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ArticleAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->Article = factory(App\Models\Article::class)->make([
            'id' => '1',
		'name' => 'cum',
		'author' => 'saepe',

        ]);
        $this->ArticleEdited = factory(App\Models\Article::class)->make([
            'id' => '1',
		'name' => 'cum',
		'author' => 'saepe',

        ]);
        $user = factory(App\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'articles');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('articles');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'articles/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'articles', $this->Article->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('articles/'.$this->Article->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'articles', $this->Article->toArray());

        $response = $this->actor->call('GET', '/articles/'.$this->Article->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('article');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'articles', $this->Article->toArray());
        $response = $this->actor->call('PATCH', 'articles/1', $this->ArticleEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('articles', $this->ArticleEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'articles', $this->Article->toArray());

        $response = $this->call('DELETE', 'articles/'.$this->Article->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('articles');
    }

}
