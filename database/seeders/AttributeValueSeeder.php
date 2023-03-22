<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            [ 'name_tm' => 'Jynsy', 'name_en' => 'Gender', 'values' => [
                ['name_tm' => 'Erkek', 'name_en' => 'Male'],
                ['name_tm' => 'Aýal', 'name_en' => 'Female'],
                ['name_tm' => 'Oglan', 'name_en' => 'Boy'],
                ['name_tm' => 'Gyz', 'name_en' => 'Girl']
            ]],
            ['name_tm' => 'Renki', 'name_en' => 'Color', 'values' =>[
                ['name_tm' => 'Ak', 'name_en' => 'White'],
                ['name_tm' => 'Gara', 'name_en' => 'Black'],
                ['name_tm' => 'Çal', 'name_en' => 'Gray'],
                ['name_tm' => 'Gyzyl', 'name_en' => 'Red'],
                ['name_tm' => 'Ýaşyl', 'name_en' => 'Green'],
                ['name_tm' => 'Gök', 'name_en' => 'Blue'],
            ]],
            ['name_tm' => 'Ölçegi', 'name_en' => 'Size', 'values' => [
                ['name_tm' => 'XS', 'name_en' => null],
                ['name_tm' => 'S', 'name_en' => null],
                ['name_tm' => 'M', 'name_en' => null],
                ['name_tm' => 'L', 'name_en' => null],
                ['name_tm' => 'XL', 'name_en' => null],
                ['name_tm' => '2XL', 'name_en' => null],
                ['name_tm' => '3XL', 'name_en' => null],

                ['name_tm' => '40', 'name_en' => null],
                ['name_tm' => '41', 'name_en' => null],
                ['name_tm' => '42', 'name_en' => null],
                ['name_tm' => '43', 'name_en' => null],
                ['name_tm' => '44', 'name_en' => null],
                ['name_tm' => '45', 'name_en' => null],

                ['name_tm' => '30', 'name_en' => null],
                ['name_tm' => '32', 'name_en' => null],
                ['name_tm' => '34', 'name_en' => null],
                ['name_tm' => '36', 'name_en' => null],
                ['name_tm' => '38', 'name_en' => null],
                ['name_tm' => '40', 'name_en' => null],

                ['name_tm' => '48', 'name_en' => null],
                ['name_tm' => '50', 'name_en' => null],
                ['name_tm' => '52', 'name_en' => null],
                ['name_tm' => '54', 'name_en' => null],
            ]],
        ];

        for ($i = 0; $i < count($objs); $i++) {
            $attribute = Attribute::create([
                'name_tm' => $objs[$i]['name_tm'],
                'name_en' => $objs[$i]['name_en'],
                'sort_order' => $i + 1,
            ]);

            for ($j = 0; $j < count($objs[$i]['values']); $j++) {
                AttributeValue::create([
                    'attribute_id' => $attribute->id,
                    'name_tm' => $objs[$i]['values'][$j]['name_tm'],
                    'name_en' => $objs[$i]['values'][$j]['name_en'],
                    'sort_order' => $j + 1,
                ]);
            }
        }
    }
}
