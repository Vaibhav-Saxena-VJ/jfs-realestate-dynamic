<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanctionCalculator extends Model
{
    use HasFactory;
    public $primaryKey="sanction_calc_id";
    protected $table="sanction_calculator";
}
