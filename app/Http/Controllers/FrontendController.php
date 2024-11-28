<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use App\Models\User;
use App\Models\Slider;
// use App\Models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{


    // View main page 
    public function index()
    {
        // $settings= setting::all();
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
 


public function applyLoan(Request $request)
{
    // Validate the request data
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
        'district' => 'required|string|max:255',
        'police_station' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'account_no' => 'required|string|max:255',
        'branch' => 'required|string|max:255',
        'account_holder' => 'required|string|max:255',
        'loan_amount' => 'required|numeric|min:1000',
        'repayment_period' => 'required|string',
        'photo' => 'required|image|max:2048',
        'signature' => 'required|image|max:2048',
        'guarantor_name' => 'required|string|max:255',
        'guarantor_father_name' => 'required|string|max:255',
        'guarantor_mother_name' => 'required|string|max:255',
        'guarantor_nid' => 'required|string|max:255',
        'guarantor_thana' => 'required|string|max:255',
        'guarantor_zilla' => 'required|string|max:255',
    ]);

        // Calculate the loan details
        // $loanAmount = $validated['loan_amount'];
        // $repaymentDate = new \DateTime($validated['repayment_period']);
        // $today = new \DateTime();
    
        // দিন গণনা
        // $interval = $today->diff($repaymentDate);
        // $days = $interval->days;
    
        // ইন্টারেস্ট হিসাব (০.৫%/দিন)
        // $interestRate = 0.005; // ০.৫%
        // $totalInterest = $loanAmount * $interestRate * $days;
    
        // মোট লোন এমাউন্ট
        // $totalLoanAmount = $loanAmount + $totalInterest;


    // Handle the file uploads
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
    }

    if ($request->hasFile('signature')) {
        $signaturePath = $request->file('signature')->store('signatures', 'public');
    }


    // Create the loan application and save to the database
    LoanApplication::create(array_merge($validated, [
        'user_id' => auth()->user()->id,
        'photo' => $photoPath ?? null,
        'signature' => $signaturePath ?? null,
    ]));

    // $loan_app = new LoanApplication();
    // $loan_app->user_id = auth()->user()->id;
    // $loan_app->full_name = $request->f_name ." " . $request->f_name;
    // $loan_app->save();

    // Redirect back with a success message
    return back()->with('success', 'Your loan application has been submitted and is pending approval!');
}


   public function withdrawForm()
   {
       return view('frontend.pages.withdraw');
   }
   
   public function withdrawSubmit(Request $request)
   {
       $request->validate([
           'withdraw_via' => 'required|in:bkash,nagad,rocket,bank', 
           'account_number' => 'required|string|max:255',
           'account_name' => 'required|string|max:255',
           'amount' => 'required|numeric|min:1',
           'branch' => $request->withdraw_via === 'bank' ? 'required|string|max:255' : 'nullable',
       ]);
   
       // Success message redirect
       return redirect()->route('withdraw.success')->with('success', 'Withdrawal requests are not permitted at this stage');
   }

   public function history()
   {
       if (!Auth::check()) {
           return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
       }
   
       $user = Auth::user(); 
       
       // সমস্ত লোন ডাটা রিট্রিভ করা (স্ট্যাটাস কিছু না ফিল্টার করা)
       $loans = LoanApplication::where('user_id', $user->id)
                   ->get(); // সব লোন ডাটা আনা
   
       return view('frontend.pages.loan_history', compact('user', 'loans'));
   }
   
   
   

}