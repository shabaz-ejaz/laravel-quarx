<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class BookAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->Book = factory(App\Models\Book::class)->make([
            'id' => '1',
		' title' => 'distinctio',
		'author' => 'aut',

        ]);
        $this->BookEdited = factory(App\Models\Book::class)->make([
            'id' => '1',
		' title' => 'distinctio',
		'author' => 'aut',

        ]);
        $user = factory(App\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'books');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('books');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'books/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'books', $this->Book->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('books/'.$this->Book->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'books', $this->Book->toArray());

        $response = $this->actor->call('GET', '/books/'.$this->Book->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('book');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'books', $this->Book->toArray());
        $response = $this->actor->call('PATCH', 'books/1', $this->BookEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('books', $this->BookEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'books', $this->Book->toArray());

        $response = $this->call('DELETE', 'books/'.$this->Book->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('books');
    }

}
