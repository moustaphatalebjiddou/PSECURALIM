<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perimetre extends Model
{
    use HasFactory;

    protected $fillable = ['localite_id', 'nom_du_perimetre'];

    public function localite()
    {
        return $this->belongsTo(Localite::class);
    }
}
