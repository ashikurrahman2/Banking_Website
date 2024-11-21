<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    use HasFactory;

    protected $fillable = ['loan_type'];

    public static function newLoans($request)
    {
        $loan = new self();
        self::saveBasicInfo($loan, $request);
    }

    public static function updateLoans($request, $loan)
    {
        self::saveBasicInfo($loan, $request);
    }

    private static function saveBasicInfo($loan, $request)
    {
        $loan->loan_type  = $request->loan_type;
        $loan->save();
    }

    public static function deleteLoans($loan)
    {
        $loan->delete();
    }
}
