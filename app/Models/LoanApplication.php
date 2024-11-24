<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_type', 'F_name', 'M_name', 'spouse_name', 'd_birth', 'gender',
        'pass_num', 'country', 'phone', 'social_phone', 'permanent_address',
        'dittrict', 'police_station', 'email', 'account_no', 'branch',
        'account_holder', 'loan_amount', 'repayment_period', 'guarantor_name',
        'guarantor_father_name', 'guarantor_mother_name', 'guarantor_nid',
        'guarantor_thana', 'guarantor_zilla', 'status','user_id',
    ];

  

        // Default value for status
        protected $attributes = [
            'status' => 'pending',
        ];

    public function loanType()
    {
        return $this->belongsTo(LoanType::class);
    }
}
