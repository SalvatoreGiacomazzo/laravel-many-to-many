<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Felony;
use App\Models\Wanted;

class WantedFelonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $wanted = Wanted::all();


        foreach ($wanted as $singleWanted) {

            $feloniesCount = rand(1, 3);

            $felonies = Felony::inRandomOrder()->take($feloniesCount)->get();


            foreach ($felonies as $felony) {
                $singleWanted->felonies()->attach($felony->id);
            }
        }
    }
}
