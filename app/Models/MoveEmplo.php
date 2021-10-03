<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoveEmplo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'movement_id',
        'employee_id',
        'description',
    ];

    protected $table = 'movemplos';


    public function movement(){

        return $this->belongsTo('App\Models\Movement');
    }
    public function employee(){
        return $this->belongsTo('App\Models\Employee');
    }

}
