<?php

namespace Database\Seeders;

use App\Models\GraphicCard;
use Illuminate\Database\Seeder;

class VGASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $graphicCards = [
            // NVIDIA GeForce Series (Laptop & Desktop)
            ['model' => 'NVIDIA GeForce GTX 1650', 'vram' => '4 GB'],
            ['model' => 'NVIDIA GeForce GTX 1660 Ti', 'vram' => '6 GB'],
            ['model' => 'NVIDIA GeForce RTX 2060', 'vram' => '6 GB'],
            ['model' => 'NVIDIA GeForce RTX 3060', 'vram' => '6 GB'],
            ['model' => 'NVIDIA GeForce RTX 3070', 'vram' => '8 GB'],
            ['model' => 'NVIDIA GeForce RTX 3080', 'vram' => '10 GB'],
            ['model' => 'NVIDIA GeForce RTX 3090', 'vram' => '24 GB'],
            ['model' => 'NVIDIA GeForce RTX 4060', 'vram' => '8 GB'],
            ['model' => 'NVIDIA GeForce RTX 4070', 'vram' => '12 GB'],
            ['model' => 'NVIDIA GeForce RTX 4080', 'vram' => '16 GB'],
            ['model' => 'NVIDIA GeForce RTX 4090', 'vram' => '24 GB'],

            // AMD Radeon Series (Laptop & Desktop)
            ['model' => 'AMD Radeon RX 5500 XT', 'vram' => '4 GB'],
            ['model' => 'AMD Radeon RX 5600 XT', 'vram' => '6 GB'],
            ['model' => 'AMD Radeon RX 5700 XT', 'vram' => '8 GB'],
            ['model' => 'AMD Radeon RX 6600', 'vram' => '8 GB'],
            ['model' => 'AMD Radeon RX 6700 XT', 'vram' => '12 GB'],
            ['model' => 'AMD Radeon RX 6800 XT', 'vram' => '16 GB'],
            ['model' => 'AMD Radeon RX 6900 XT', 'vram' => '16 GB'],
            ['model' => 'AMD Radeon RX 7600', 'vram' => '8 GB'],
            ['model' => 'AMD Radeon RX 7700 XT', 'vram' => '12 GB'],
            ['model' => 'AMD Radeon RX 7900 XT', 'vram' => '20 GB'],

            // Intel Arc Series (Laptop & Desktop)
            ['model' => 'Intel Arc A380', 'vram' => '6 GB'],
            ['model' => 'Intel Arc A750', 'vram' => '8 GB'],
            ['model' => 'Intel Arc A770', 'vram' => '16 GB'],
        ];

        foreach ($graphicCards as $card) {
            GraphicCard::updateOrCreate(
                ['model' => $card['model']],
                ['vram' => $card['vram']]
            );
        }
    }
}
