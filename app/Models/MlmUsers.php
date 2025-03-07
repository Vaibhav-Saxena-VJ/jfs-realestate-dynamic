<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MlmUsers extends Model
{
    use HasFactory;

    protected $table = 'm_users'; 
    
    protected $fillable = [
        'name',
        'email_id',
        'sponser_id',
        'left_child_id',
        'right_child_id'
    ];
}
