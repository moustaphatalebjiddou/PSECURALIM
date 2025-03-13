<?php

namespace App\Exports;

use App\Models\Complement;
use Maatwebsite\Excel\Concerns\FromCollection;

class ComplementExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Complement::all();
    }
}
