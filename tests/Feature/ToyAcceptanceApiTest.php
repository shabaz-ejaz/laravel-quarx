<?php

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ToyAcceptanceApiTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->Toy = factory(App\Models\Toy::class)->make([
            'id' => '1',
		' title' => 'quos',
		'author' => 'ea',

        ]);
        $this->ToyEdited = factory(App\Models\Toy::class)->make([
            'id' => '1',
		' title' => 'quos',
		'author' => 'ea',

        ]);
        $user = factory(App\Models\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', 'api/v1/toys');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'api/v1/toys', $this->Toy->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['id' => 1]);
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'api/v1/toys', $this->Toy->toArray());
        $response = $this->actor->call('PATCH', 'api/v1/toys/1', $this->ToyEdited->toArray());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertDatabaseHas('toys', $this->ToyEdited->toArray());
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'api/v1/toys', $this->Toy->toArray());
        $response = $this->call('DELETE', 'api/v1/toys/'.$this->Toy->id);
        $this->assertEquals(200, $response->getStatusCode());
        $this->seeJson(['success' => 'toy was deleted']);
    }

}
