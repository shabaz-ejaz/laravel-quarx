<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TagAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->Tag = factory(App\Models\Tag::class)->make([
            'id' => '1',
		'name' => 'et',
		'author' => 'iure',

        ]);
        $this->TagEdited = factory(App\Models\Tag::class)->make([
            'id' => '1',
		'name' => 'et',
		'author' => 'iure',

        ]);
        $user = factory(App\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'tags');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('tags');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'tags/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'tags', $this->Tag->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('tags/'.$this->Tag->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'tags', $this->Tag->toArray());

        $response = $this->actor->call('GET', '/tags/'.$this->Tag->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('tag');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'tags', $this->Tag->toArray());
        $response = $this->actor->call('PATCH', 'tags/1', $this->TagEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('tags', $this->TagEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'tags', $this->Tag->toArray());

        $response = $this->call('DELETE', 'tags/'.$this->Tag->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('tags');
    }

}
