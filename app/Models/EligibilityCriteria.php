<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EligibilityCriteria extends Model
{
    use HasFactory;
    protected $table = 'eligiblity_criteria'; // Ensure this matches your table name
    protected $primaryKey = 'ec_id';
    protected $fillable = [
        'user_id',
        'loan_id',
        'let_out_income_json',
        'let_out_income_amount',
        'rental_income_json',
        'rental_income_amount',
        'income_from_business_json',
        'income_from_business_amount',
        'remunration_income_json',
        'remunration_income_amount',
        'Salary_from_firm_json',
        'Salary_from_firm_amount',
        'firm_share_profit_json',
        'firm_share_profit_amount',
        'capital_interest_income_json',
        'capital_interest_income_amount',
        'agriculture_income_json',
        'agriculture_income_amount',
        'depreciation_json',
        'depreciation_amount',
        'income_json',
        'income_amount',
        'deduction_json',
        'deduction_amount',
        'tax_amount',
        'all_exiting_emi_json',
        'all_exiting_emi_amount',
        'proposed_emi',
        'coapplicant_salary',
        'coapplicant_remunration_income_amount',
        'coapplicant_remunration_income_json',
        'provisional_fund_name',
        'provisional_fund_amount'
    ];
}
