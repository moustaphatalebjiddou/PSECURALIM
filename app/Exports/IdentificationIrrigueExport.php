<?php

namespace App\Exports;

use App\Models\IdentificationIrrigue;
use Maatwebsite\Excel\Concerns\FromCollection;

class IdentificationIrrigueExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
//        return IdentificationIrrigue::select('','')->get();
        return IdentificationIrrigue::all();
    }
}
