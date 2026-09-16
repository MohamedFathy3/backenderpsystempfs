<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Hardware Issues', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Software Installation', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Network', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Email & Communication', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Printer & Peripheral Issues', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Security & Access', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Performance Issues', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'System Updates & Patching', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Cloud & Server Issues', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Data Backup & Recovery', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'User Account Management', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Software Bugs & Errors', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Mobile Device Issues', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Remote Access Issues', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Other IT Issues', 'time' => '50:44' , 'type_id' => 8],

            ['name' => 'Device Not Powering On', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Overheating Issues', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Hardware Failure', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Screen Flickering', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'No Display', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Battery Issues', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Charging Port Issues', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Audio Issues', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Bluetooth Connectivity Issues', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Software Crashes', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Application Not Responding', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Operating System Issues', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Network Connectivity Issues', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Battery Not Charging', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Camera Not Detected', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'USB Ports Not Working', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Wi-Fi Not Connecting', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Blue Screen Error', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Slow Performance', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'System Not Booting', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Noise from Device', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Hard Disk Not Found', 'time' => '50:44' , 'type_id' => 8],
            ['name' => 'Keyboard/Mouse Not Responding', 'time' => '50:44' , 'type_id' => 8],
        ];

        DB::table('categories')->insert($categories);
    }
}
