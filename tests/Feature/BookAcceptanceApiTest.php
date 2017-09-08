<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BookAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->Book = factory(App\Models\Book::class)->make([
            'id' => '1',
		' title' => 'laboriosam',
		'author' => 'totam',

        ]);
        $this->BookEdited = factory(App\Models\Book::class)->make([
            'id' => '1',
		' title' => 'laboriosam',
		'author' => 'totam',

        ]);
        $user = factory(App\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/books');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/books', $this->Book->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/books', $this->Book->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/books/1', $this->BookEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseHas('books', $this->BookEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/books', $this->Book->toArray());
        $response = $this->call('DELETE', 'api/v1/books/'.$this->Book->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'book was deleted']);
    }

}
