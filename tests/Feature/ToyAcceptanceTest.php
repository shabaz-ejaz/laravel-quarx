<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ToyAcceptanceTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->Toy = factory(App\Models\Toy::class)->make([
            'id' => '1',
		' title' => 'alias',
		'author' => 'soluta',

        ]);
        $this->ToyEdited = factory(App\Models\Toy::class)->make([
            'id' => '1',
		' title' => 'alias',
		'author' => 'soluta',

        ]);
        $user = factory(App\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'toys');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('toys');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', 'toys/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'toys', $this->Toy->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('toys/'.$this->Toy->id.'/edit');
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'toys', $this->Toy->toArray());

        $response = $this->actor->call('GET', '/toys/'.$this->Toy->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('toy');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'toys', $this->Toy->toArray());
        $response = $this->actor->call('PATCH', 'toys/1', $this->ToyEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertDatabaseHas('toys', $this->ToyEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'toys', $this->Toy->toArray());

        $response = $this->call('DELETE', 'toys/'.$this->Toy->id);
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('toys');
    }

}
