<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    use HasFactory;
    protected $fillable = ['nom_du_wilaya'];

    public function moughataas()
    {
        return $this->hasMany(Moughataa::class);
    }

    
}
