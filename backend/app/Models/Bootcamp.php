<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{
    use HasFactory;

    //FILLABLE: PERMITE REALIZAR
    //INSERTAR VARIAS INSTANCIAS AL TIEMPO
    protected $fillable=[   
                            'name',
                            'description',
                            'website',
                            'phone',
                            'user_id'
                        ];
}
