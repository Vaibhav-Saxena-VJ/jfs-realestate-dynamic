<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExistingLoan extends Model
{
    use HasFactory;
    protected $table = 'existing_loan';

    protected $fillable = [
        'user_id',
        'type_loan',
        'loan_amount',
        'tenure_loan',
        'emi_amount',
        'sanction_date',
        'emi_bounce_count',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
