<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Character;

class CharacterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCharacterCreatedSuccessfully()
    {
        $characterData = [
                "characterName" => "Randal Graves",
                "characterLink" => "\/name\/Randal\/",
                "characterImageThumb" => "https:\/\/images.com\/image.jpg",
                "royal"=> false,
                "allies"=> [
                    "Silent Bob",
                    "Jay"
                ],
            ];

        $this->json('POST', 'api/characters', $characterData , ['Accept' => 'application/json'])
            ->assertCreated()->assertJson(
                $characterData
            );
    }

    public function testCharacterListedSuccesfully()
    {
        Character::factory()->create();
        Character::factory()->create();

        $this->json('GET', 'api/characters', ['Accept' => 'application/json'])
        ->assertStatus(200)->assertJsonCount(2);
    }

    public function testCharacterUpdatedSuccesfully()
    {
        $characterData = Character::factory()->create();

        $this->json('PUT', 'api/characters/'.$characterData->id, ["characterName" => "Dante Hicks"], ['Accept' => 'application/json'])
        ->assertStatus(200)->assertJsonFragment(['characterName' => "Dante Hicks"]);
    }

    public function testCharacterDeleteSuccesfully()
    {
        $characterData = Character::factory()->create();

        $this->json('DELETE', 'api/characters/'.$characterData->id, ['Accept' => 'application/json'])
        ->assertStatus(200)->assertJson([]);
    }

    public function testCharacterSearchSuccesfully()
    {
        $characterData = Character::factory()->create(["characterName" => "Elias"]);

        $this->json('GET', 'api/characters/search/'.$characterData->characterName, ['Accept' => 'application/json'])
        ->assertStatus(200)->assertJsonFragment(['characterName' => "Elias"]);
    }
}
