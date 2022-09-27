<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Actor;
use App\Models\Character;

class ActorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    private $characterID;

    // protected function setUp(): void
    // {
    //     $characterData = Character::factory()->create();
    //     $this->characterID = $characterData->id;
    // }
    
    public function testActorCreatedSuccessfully()
    {

        $characterData = Character::factory()->create();
        $characterID = $characterData->id;

        $actorData = [
                "actorName" => "Brian O'Halloran",
                "characterID" => $characterID,
        ];

        $this->json('POST', 'api/actors', $actorData , ['Accept' => 'application/json'])
            ->assertCreated()->assertJsonFragment(['actorName' => "Brian O'Halloran"]);
    }
      
    public function testActorListedSuccesfully()
    {
        $characterData = Character::factory()->create();
        $characterID = $characterData->id;

        Actor::factory()->create(["characterID" => $characterID]);
        Actor::factory()->create(["characterID" => $characterID]);

        $this->json('GET', 'api/actors', ['Accept' => 'application/json'])
        ->assertStatus(200)->assertJsonCount(2);
    }

    public function testActorUpdatedSuccesfully()
    { 
        $characterData = Character::factory()->create();
        $characterID = $characterData->id;

        $actorData = Actor::factory()->create(["characterID" => $characterID]);

        $this->json('PUT', 'api/actors/'.$actorData->id, ["actorName" => "Jeff Anderson"], ['Accept' => 'application/json'])
        ->assertStatus(200)->assertJsonFragment(['actorName' => "Jeff Anderson"]);
    }

    public function testActorDeleteSuccesfully()
    {
        $characterData = Character::factory()->create();
        $characterID = $characterData->id;

        $actorData = Actor::factory()->create(["characterID" => $characterID]);

        $this->json('DELETE', 'api/actors/'.$actorData->id, ['Accept' => 'application/json'])
        ->assertStatus(200)->assertJson([]);
    }

    public function testActorSearchSuccesfully()
    {
        $characterData = Character::factory()->create();
        $characterID = $characterData->id;
        $actorData = Actor::factory()->create(["actorName" => "Elias", "characterID" => $characterID]);

        $this->json('GET', 'api/actors/search/'.$actorData->actorName, ['Accept' => 'application/json'])
        ->assertStatus(200)->assertJsonFragment(['actorName' => "Elias"]);
    }
}
