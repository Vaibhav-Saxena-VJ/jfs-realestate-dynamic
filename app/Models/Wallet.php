<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'wallet'; 
    protected $primaryKey = 'wallet_id';
    protected $fillable = ['user_id', 'wallet_balance', 'created_at', 'updated_at'];    
}

