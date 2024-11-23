<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanType extends Model
{
    use HasFactory;

    protected $fillable = ['name']; 

       // LoanApplication এর সাথে সম্পর্ক স্থাপন
       public function loanApplications()
       {
           return $this->hasMany(LoanApplication::class);
       }
}
