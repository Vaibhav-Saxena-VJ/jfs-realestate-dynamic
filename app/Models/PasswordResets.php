<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResets extends Model
{
    use HasFactory;
   
    protected $fillable = [
        'email',
        'token',
        'exp_date',
        'user_id',
        'role_id'
    ];
}
