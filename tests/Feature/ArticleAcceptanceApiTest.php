<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ArticleAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->Article = factory(App\Models\Article::class)->make([
            'id' => '1',
		'name' => 'aut',
		'author' => 'deserunt',

        ]);
        $this->ArticleEdited = factory(App\Models\Article::class)->make([
            'id' => '1',
		'name' => 'aut',
		'author' => 'deserunt',

        ]);
        $user = factory(App\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/articles');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/articles', $this->Article->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/articles', $this->Article->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/articles/1', $this->ArticleEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseHas('articles', $this->ArticleEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/articles', $this->Article->toArray());
        $response = $this->call('DELETE', 'api/v1/articles/'.$this->Article->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'article was deleted']);
    }

}
