<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use File;
use App\Models\Character;
use App\Models\Actor;
use PHPUnit\Framework\Error;

class CharacterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actors')->delete();
        DB::table('characters')->delete();

        $got_characters_json = File::get("database/seeds/got-characters.json");
        $got_characters = json_decode($got_characters_json, true)['characters'];

        foreach($got_characters as $got_character) {
            $actors = [];
            foreach($got_character as $character_key => &$character_data) {
                if (is_array($character_data)) {
                    if ($character_key === "actors") {
                        foreach ($character_data as $actor_data) {
                            $actor_data['seasonsActive'] = implode(', ', $actor_data['seasonsActive']);
                            $actors[] = $actor_data;
                        }
                        unset($got_character['actors']);
                    } else {
                        $got_character[$character_key] = implode(', ', $character_data);
                    }
                }
            }

            if(isset($got_character['actorName'])) {
                $actors[0]['actorName'] = $got_character['actorName'];
                unset($got_character['actorName']);
            }

            if (isset($got_character['actorLink'])) {
                $actors[0]['actorLink'] = $got_character['actorLink'];
                unset($got_character['actorLink']);
            }

            $character_id = Character::create($got_character)->id;

            foreach($actors as $actor) {
                $actor['characterID'] = $character_id;
                Actor::create($actor);
            }
        }
    }
}
