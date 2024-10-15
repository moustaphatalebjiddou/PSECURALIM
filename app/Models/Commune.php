<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    protected $fillable = ['nom_du_commune', 'moughataa_id'];

    public function moughataa()
    {
        return $this->belongsTo(Moughataa::class);
    }
    
}
