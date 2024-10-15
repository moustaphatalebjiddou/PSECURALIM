<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    use HasFactory;

    protected $fillable = ['nom_du_localite', 'commune_id'];

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }
}
