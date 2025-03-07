<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foir extends Model
{
    use HasFactory;

    protected $table = 'foir'; // Ensure this matches your table name
    protected $primaryKey = 'id';

    // Specify the columns that can be mass-assigned
    protected $fillable = [
        'bank_name',
        'min_salary',
        'max_salary',
        'foir_percentage',
    ];
}