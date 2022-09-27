<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use File;
use App\Models\Character;
use App\Models\Actor;
use PHPUnit\Framework\Error;

class GOTDBSeeder extends Seeder
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

        $characters = json_decode(File::get("database/seeds/got-characters.json"), true)['characters'];

        foreach($characters as $character) {
            $actors = [];
            foreach($character as $characterKey => &$characterData) {
                if (is_array($characterData)) {
                    if ($characterKey === "actors") {
                        foreach ($characterData as $actorData) {
                            $actorData['seasonsActive'] = json_encode($actorData['seasonsActive']);
                            $actors[] = $actorData;
                        }
                        unset($character['actors']);
                    } else {
                        $character[$characterKey] = json_encode($characterData);
                    }
                }
            }

            if(isset($character['actorName'])) {
                $actors[0]['actorName'] = $character['actorName'];
                unset($character['actorName']);
            }

            if (isset($character['actorLink'])) {
                $actors[0]['actorLink'] = $character['actorLink'];
                unset($character['actorLink']);
            }

            $characterID = Character::create($character)->id;

            foreach($actors as $actor) {
                $actor['characterID'] = $characterID;
                Actor::create($actor);
            }
        }
    }
}
