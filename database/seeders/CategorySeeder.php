<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            ['name_tm' => 'Egin-eşik', 'name_en' => null, [
                ['name_tm' => 'Jempir', 'name_en' => null],
                ['name_tm' => 'Jempir', 'name_en' => null],
                ['name_tm' => 'Köýnek', 'name_en' => null],
                ['name_tm' => 'Futbolka', 'name_en' => null],
                ['name_tm' => 'Balak', 'name_en' => null],
            ]],
            ['name_tm' => 'Aýakgap', 'name_en' => null, [
                ['name_tm' => 'Sport Aýakgap', 'name_en' => null],
                ['name_tm' => 'Klasik Aýakgap', 'name_en' => null],
                ['name_tm' => 'Şypbyklar', 'name_en' => null],
            ]]
        ];

        for ($i = 0; $i < count($objs); $i++) {
            $category = Category::create ([
                'name_tm' => $objs[$i]['name_tm'],
                'name_en' => $objs[$i]['name_en'],
                'sort_order' => $i + 1,
            ]);
            for ($j = 0; $j < count($objs[$i][2]); $j++) {
                Category::create([
                    'parent_id' => $category->id,
                    'name_tm' => $objs[$i][2][$j]['name_tm'],
                    'name_en' => $objs[$i][2][$j]['name_en'],
                    'sort_order' => $j + 1,
                ]);
            }
        }
    }
}
