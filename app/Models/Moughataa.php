<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moughataa extends Model
{
    use HasFactory;

    protected $fillable = ['nom_du_moughataa', 'wilaya_id'];

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }
}
