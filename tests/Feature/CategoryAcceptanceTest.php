<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->Category = factory(App\Models\Category::class)->make([
            'id' => '1',
		'title' => 'quod',
		'author' => 'quaerat',

        ]);
        $this->CategoryEdited = factory(App\Models\Category::class)->make([
            'id' => '1',
		'title' => 'quod',
		'author' => 'quaerat',

        ]);
        $user = factory(App\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'categories');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('categories');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'categories/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'categories', $this->Category->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('categories/'.$this->Category->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'categories', $this->Category->toArray());

        $response = $this->actor->call('GET', '/categories/'.$this->Category->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('category');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'categories', $this->Category->toArray());
        $response = $this->actor->call('PATCH', 'categories/1', $this->CategoryEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('categories', $this->CategoryEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'categories', $this->Category->toArray());

        $response = $this->call('DELETE', 'categories/'.$this->Category->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('categories');
    }

}
