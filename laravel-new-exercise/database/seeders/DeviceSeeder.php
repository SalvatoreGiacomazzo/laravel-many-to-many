<?php

namespace Database\Seeders;

use App\Models\Device;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $devicesType = [
            "Computer",
            "Laptop",
            "Smartphone",
            "Tablet",
            "Modems",
            "Drones",
            "CCTV"

        ];

        foreach ($devicesType as $device) {

            Device::firstOrCreate(
                ['device_type' => $device],
                ['device_type' => $device]
            );
        }
    }
}
