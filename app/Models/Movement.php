<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $fillable = [
        'movement_type',
    ];
    protected $table = 'movements';

    public function movemplo(){

        return $this->hasMany('App\Models\MovEmplo');
    }
}
