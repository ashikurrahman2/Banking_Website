<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{


    // View main page 
    public function index()
    {
        $sliders= Slider::all();
        return view('frontend.pages.home', compact('sliders'));
    }
    // View loan item part
    public function submission(){
        return view('frontend.pages.loan_item');
    }

   
     // Loan form part
// Loan form part
 public function loanForm($type)
{
    // Set loan type according information
    $loanDetails = [
        'personal' => ['title' => 'Personal Loan', 'rate' => '6.68%'],
        'home' => ['title' => 'Home Loan', 'rate' => '6.68%'],
        'car' => ['title' => 'Car Loan', 'rate' => '5.68%'],
        'business' => ['title' => 'Business Loan', 'rate' => '7.56%'],
        'education' => ['title' => 'Education Loan', 'rate' => '8.56%'],
   
    ];

    // Check Loan Type
    if (!isset($loanDetails[$type])) {
        abort(404, 'Loan type not found.');
    }

    // Showing loan form page
    return view('frontend.pages.loan_form', [
        'loanType' => $type,
        'loanDetails' => $loanDetails[$type],
    ]);

 }
 
// Form submission request
public function applyLoan(Request $request)
{
    $validated = $request->validate([
        'loan_type' => 'required',
        'F_name' => 'required|string|max:255',
        'M_name' => 'required|string|max:255',
        'spouse_name' => 'nullable|string|max:255',
        'd_birth' => 'required|date',
        'gender' => 'required|string|max:255',
        'pass_num' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'social_phone' => 'nullable|string|max:255',
        'permanent_address' => 'required|string|max:255',
        'dittrict' => 'required|string|max:255',
        'police_station' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'account_no' => 'required|string|max:255',
        'branch' => 'required|string|max:255',
        'account_holder' => 'required|string|max:255',
        'loan_amount' => 'required|numeric|min:1000',
        'repayment_period' => 'required|string',
        'guarantor_name' => 'required|string|max:255',
        'guarantor_father_name' => 'required|string|max:255',
        'guarantor_mother_name' => 'required|string|max:255',
        'guarantor_nid' => 'required|string|max:255',
        'guarantor_thana' => 'required|string|max:255',
        'guarantor_zilla' => 'required|string|max:255',
    ]);

    LoanApplication::create($validated);

    return back()->with('success', 'Your loan application has been submitted and is pending approval!');
}


}
