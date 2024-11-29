<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;
   // Mass assignable attributes
   protected $fillable = [
    'loan_type', 
    'name', 
    'F_name', 
    'M_name', 
    'spouse_name', 
    'd_birth', 
    'gender', 
    'pass_num', 
    'country', 
    'phone', 
    'social_phone', 
    'permanent_address', 
    'district', 
    'police_station', 
    'email', 
    'account_no', 
    'branch', 
    'account_holder', 
    'loan_amount', 
    'repayment_period', 
    'photo', 
    'signature', 
    'guarantor_name', 
    'guarantor_father_name', 
    'guarantor_mother_name', 
    'guarantor_nid', 
    'guarantor_thana', 
    'guarantor_zilla', 
    'status',
    'user_id',
];

    // Default value for status
    protected $attributes = [
        'status' => 'pending',
    ];

    // Relationship with LoanType
    public function loanType()
    {
        return $this->belongsTo(LoanType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Accessor for full name.
     * Combines `F_name` and `M_name` for better presentation.
     */
    public function getFullNameAttribute()
    {
        return "{$this->F_name} {$this->M_name}";
    }

    /**
     * Mutator to format `loan_amount` before saving to database.
     */
    public function setLoanAmountAttribute($value)
    {
        $this->attributes['loan_amount'] = round($value, 2);
    }
}
