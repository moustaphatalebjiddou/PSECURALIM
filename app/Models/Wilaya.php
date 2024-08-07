<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'wilaya';

    protected $fillable = [
        'moughataa',
        'localite',
        'commune',
        'nom_du_perimetre',
        'nom_du_wilaya',

    ];
}
