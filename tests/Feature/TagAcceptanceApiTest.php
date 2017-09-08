<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TagAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->Tag = factory(App\Models\Tag::class)->make([
            'id' => '1',
		'name' => 'dicta',
		'author' => 'dolorum',

        ]);
        $this->TagEdited = factory(App\Models\Tag::class)->make([
            'id' => '1',
		'name' => 'dicta',
		'author' => 'dolorum',

        ]);
        $user = factory(App\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/tags');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/tags', $this->Tag->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/tags', $this->Tag->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/tags/1', $this->TagEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseHas('tags', $this->TagEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/tags', $this->Tag->toArray());
        $response = $this->call('DELETE', 'api/v1/tags/'.$this->Tag->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'tag was deleted']);
    }

}
