<?php

namespace App\Imports;

use App\Debc\BusinessActivity\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CategoriesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'group' => $row[0],
            'sub_group' => $row[1],
            'code' => $row[2],
            'name_km' => $row[3],
            'slug' => $row[4],
            'm_name_km' =>1
        ]);
    }
}
