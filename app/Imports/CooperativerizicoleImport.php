<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models;
use App\Models\Cooperativerizicole;

class CooperativerizicoleImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model
    */
    public function model(array $row)
    {
        return new Cooperativerizicole([
            'wilaya_id' =>1,
            'nom_cooperative' => $row[5],
        ]);
    }
}
