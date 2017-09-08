<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->Category = factory(App\Models\Category::class)->make([
            'id' => '1',
		'title' => 'accusamus',
		'author' => 'et',

        ]);
        $this->CategoryEdited = factory(App\Models\Category::class)->make([
            'id' => '1',
		'title' => 'accusamus',
		'author' => 'et',

        ]);
        $user = factory(App\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/categories');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/categories', $this->Category->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/categories', $this->Category->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/categories/1', $this->CategoryEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseHas('categories', $this->CategoryEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/categories', $this->Category->toArray());
        $response = $this->call('DELETE', 'api/v1/categories/'.$this->Category->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'category was deleted']);
    }

}
