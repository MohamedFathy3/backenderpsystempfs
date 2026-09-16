<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\DeviceModel;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            'Apple' => ['MacBook Air', 'MacBook Pro 13', 'MacBook Pro 14', 'MacBook Pro 16', 'MacBook'],
            'Dell' => ['XPS 13', 'XPS 15', 'Inspiron 15', 'Latitude 14', 'Alienware m15'],
            'HP' => ['Spectre x360', 'Envy 13', 'Pavilion 15', 'EliteBook 840', 'Omen 16'],
            'Lenovo' => ['ThinkPad X1 Carbon', 'Yoga 9i', 'Legion 5', 'IdeaPad 5', 'ThinkBook 14'],
            'Asus' => ['ROG Zephyrus G14', 'VivoBook 15', 'ZenBook 14', 'TUF Gaming F15', 'ExpertBook B9'],
            'Acer' => ['Aspire 5', 'Predator Helios 300', 'Swift 3', 'Nitro 5', 'Spin 5'],
            'MSI' => ['Stealth 15M', 'Raider GE78', 'Prestige 14', 'Titan GT77', 'Modern 15'],
            'Razer' => ['Blade 15', 'Blade Stealth 13', 'Blade 17', 'Blade 14', 'Razer Book 13'],
            'Samsung' => ['Galaxy Book 3 Pro', 'Galaxy Book Flex', 'Galaxy Book Go', 'Galaxy Chromebook', 'Galaxy Book 2'],
            'Microsoft' => ['Surface Laptop 5', 'Surface Laptop Studio', 'Surface Book 3', 'Surface Pro 9', 'Surface Go 3'],
            'Toshiba' => ['Dynabook Tecra A50', 'Dynabook Portege X30', 'Satellite Pro', 'Tecra X40', 'Satellite C55'],
            'Sony' => ['VAIO Z', 'VAIO S', 'VAIO SE14', 'VAIO SX14', 'VAIO A12'],
            'LG' => ['Gram 16', 'Gram 14', 'Ultra PC 17', 'Gram 17', 'Gram Style'],
            'Huawei' => ['MateBook X Pro', 'MateBook 14', 'MateBook D15', 'MateBook E', 'MateBook D14'],
            'Gigabyte' => ['AERO 15', 'AORUS 17', 'G5 KD', 'G7 MD', 'AORUS 15'],
            'Fujitsu' => ['Lifebook U9310', 'Lifebook A3510', 'Lifebook S938', 'Lifebook E5411', 'Lifebook U7511'],
            'Xiaomi' => ['RedmiBook Pro 15', 'Mi Notebook Pro 14', 'Mi Gaming Laptop', 'Redmi G 2021', 'Mi Laptop Air'],
        ];

        foreach ($brands as $brandName => $models) {
            // Create or update the brand
            $brand = Brand::updateOrCreate(['name' => $brandName]);

            // Assign top 5 models to each brand
            foreach ($models as $modelName) {
                DeviceModel::updateOrCreate(
                    ['brand_id' => $brand->id, 'name' => $modelName]
                );
            }
        }
    }
}
