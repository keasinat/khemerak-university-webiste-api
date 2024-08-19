<?php

namespace Database\Seeders;

use App\Debc\Menu\Models\Academic;
use App\Debc\Menu\Models\Subject;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;
use Str;

class AcademicSeeder extends Seeder
{
    use TruncateTable, DisableForeignKeys;
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncateMultiple(['subjects', 'academics']);
        $academics = include('data/academics.php');
        foreach ($academics as $academic) {
            $academic_insert = Academic::create([
                'title_km' => $academic['name_km'],
                'title_en' => $academic['name_en'],
                'slug' => Str::slug($academic['name_en'], '_'),
                'description_km' => $academic['highlight_km'],
                'thumbnail' => $academic['thumbnail'],
                'is_top' => $academic['is_top'] ?? 0,
                'is_single_page' => $academic['is_single_page'] ?? 0
            ]);
            if(count($academic['sub_menu']) === 0){
                echo 'run-----------';
                foreach ($academic['children'] as $child) {
                    Subject::create([
                        'academic_id' => $academic_insert->id,
                        'title_km' => $child['name_km'],
                        'title_en' => $child['name_en'],
                        'slug' => Str::slug($child['name_en'], '_'),
                        'highlight_km' => $child['highlight_km'],
                        'thumbnail' => $child['thumbnail'],
                        'is_top' => $child['is_top'] ?? 0,
                        'description_km' => $child['description_km'] ?? '',
                        'description_en' => $child['description_en'] ?? ''
                    ]);
                    echo 'end run-----------';
                }
            }else{
                foreach ($academic['sub_menu'] as $sub) {
                    $sub_academic = Academic::create([
                        'parent_id' => $academic_insert->id,
                        'title_km' => $sub['name_km'],
                        'title_en' => $sub['name_en'],
                        'slug' => Str::slug($sub['name_en'], '_'),
                        'description_km' => $sub['highlight_km'],
                        'thumbnail' => $sub['thumbnail'],
                        'is_top' => $sub['is_top'] ?? 0,
                        'is_single_page' => $academic['is_single_page'] ?? 0
                    ]);
                    foreach ($sub['children'] as $child) {
                        Subject::create([
                            'academic_id' => $sub_academic->id,
                            'title_km' => $child['name_km'],
                            'title_en' => $child['name_en'],
                            'slug' => Str::slug($child['name_en'], '_'),
                            'highlight_km' => $child['highlight_km'],
                            'thumbnail' => $child['thumbnail'],
                            'is_top' => $child['is_top'] ?? 0,
                            'description_km' => $child['description_km'] ?? '',
                            'description_en' => $child['description_en'] ?? ''
                        ]);
                    }
                }
            }

        }
        $this->enableForeignKeys();
    }
}
