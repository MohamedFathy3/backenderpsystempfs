<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $filePath = public_path('port-codes-everich.xlsx');

        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        foreach ($rows as $index => $row) {
            if ($index === 1 || !isset($row['A'], $row['B'], $row['C'], $row['E'])) {
                continue;
            }

            $locode = trim($row['A']);
            $countryCode = trim($row['B']);
            $countryName = trim($row['C']);
            $portName = trim($row['E']);

            $country = DB::table('countries')->where('code', $countryCode)->first();

            if (!$country) {
                continue;
            }

            DB::table('cities')->updateOrInsert(
                [
                    'name' => Str::lower($portName),
                    'country_id' => $country->id,
                ],
                [
                    'Locode' => $locode,
                    'port_types' => json_encode([]),
                    'order_id' => null,
                    'active' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
