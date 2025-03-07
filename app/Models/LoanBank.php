<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanBank extends Model
{
    use HasFactory;
    protected $table = 'loan_bank_details'; 
    protected $primaryKey = 'bank_id'; // Make sure to specify the primary key if it's not 'id'
    public $timestamps = true;
}
