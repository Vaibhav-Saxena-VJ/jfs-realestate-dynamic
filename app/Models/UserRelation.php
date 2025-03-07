<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRelation extends Model
{
    use HasFactory;

    protected $table = 'user_relations'; 
    
    protected $fillable = [
        'parent_id',
        'user_id',
        'position',
    ];
}
