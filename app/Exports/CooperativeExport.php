<?php

namespace App\Exports;

use App\Models\Complement;
use App\Models\Cooperativerizicole;
use Maatwebsite\Excel\Concerns\FromCollection;

class CooperativeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cooperativerizicole::all();
    }
}
