<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'birthday', // Asegúrate de que este campo esté aquí
        'profile_picture',
    ];
}
