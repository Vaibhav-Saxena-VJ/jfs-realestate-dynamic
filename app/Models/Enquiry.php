<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'contact',
        'amount',
        'address',
        'message',
        'enquiry_type'
    ];
}
