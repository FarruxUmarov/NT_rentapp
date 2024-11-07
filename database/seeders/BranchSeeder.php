<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $branches = [
            'Chilonzor' => 'Tashkent city, Chilonzon district',
            'Khadra'    => 'Tashkent city, Shaykhontohur district',
            'Fargana'   => 'Fargona region, Fargona city',
            'Khorezm'   => 'Khorezm region, Urganch city'
        ];

        foreach ($branches as $name => $address) {
            Branch::factory()->create([
                'name' => $name,
                'address' => $address
            ]);
        }
    }
}
