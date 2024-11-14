<?php

namespace Database\Seeders;

use App\Models\Wanted;
use App\Models\Felony;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FelonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $felonyNames = [
            'Scam',
            'DDos Attack',
            'Identity Theft',
            'Malware Distribution',
            'Phishing',
            'Security Breaching',
            'Copyright Violation',
            'Espionage'
        ];

        foreach ($felonyNames as $felonyName) {
            $felony = new Felony();
            $felony->name = $felonyName;
            $felony->save();
        }
    }
}
