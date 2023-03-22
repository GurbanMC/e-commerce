<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            'Emporio Armani',
            'Armani Jeans',
            'Barrett',
            'Frattelli Rosetti',
            'Armani Collezioni',
            'Ramsey',
            'Tino Cosma',
            'Armani Exchange',
            'Del Mare',
            'EA7',
            'Alberto Guardiani',
            'Blu Barrett',
            'Pal Zileri'
        ];

        foreach ($objs as $obj) {
            Brand::create([
                'name' => $obj,
            ]);
    }
    }
}
