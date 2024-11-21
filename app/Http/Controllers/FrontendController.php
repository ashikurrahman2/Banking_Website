<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // View main page 
    public function index()
    {
        return view('frontend.pages.home');
    }
    // View loan item part
    public function submission(){
        return view('frontend.pages.loan_item');
    }
     // Loan form part
    public function loanForm($type)
{
    // Set loan type according information
    $loanDetails = [
        'personal' => ['title' => 'Personal Loan', 'rate' => '6.68%'],
        'car' => ['title' => 'Car Loan', 'rate' => '5.68%'],
        'business' => ['title' => 'Business Loan', 'rate' => '7.56%'],
        'education' => ['title' => 'Education Loan', 'rate' => '8.56%'],
        'payday' => ['title' => 'Payday Loan', 'rate' => '9.5%'],
        'credit' => ['title' => 'Credit Card', 'rate' => '10.50%'],
    ];

    // Check Loan Type
    if (!array_key_exists($type, $loanDetails)) {
    // not matching then 404 error
        abort(404);
    }
    // Showing loan form page
    return view('frontend.pages.loan_form', [
        'loanType' => $type,
        'loanDetails' => $loanDetails[$type],
    ]);
}

// From submission request
public function applyLoan(Request $request)
{
    $validated = $request->validate([
        'loan_type' => 'required',
        'name' => 'required|string',
        'amount' => 'required|numeric',
        'email' => 'required|email',
    ]);

    // Process data and submission
    return back()->with('success', 'Your loan application has been submitted!');
   }
}
