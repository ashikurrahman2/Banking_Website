<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use App\Models\User;
use App\Models\Slider;
use App\Models\setting;
use Illuminate\Http\Request;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{
    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->toastr = $toastr;
    }

    // View main page 
    public function index()
    {
        $settings= setting::get();
        $sliders= Slider::all();
        return view('frontend.pages.home', compact('sliders','settings'));
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
        'personal' => ['title' => 'Personal Loan', 'rate' => '3%'],
        'home' => ['title' => 'Home Loan', 'rate' => '3%'],
        'car' => ['title' => 'Car Loan', 'rate' => '3%'],
        'business' => ['title' => 'Business Loan', 'rate' => '3%'],
        'education' => ['title' => 'Education Loan', 'rate' => '3%'],
   
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
        $request->validate([
            'loan_type' => 'required',
        'F_name' => 'required|string|max:255',
        'name' => 'required|string|max:500',
        'M_name' => 'required|string|max:255',
        'spouse_name' => 'nullable|string|max:255',
        'd_birth' => 'required|string',
        'gender' => 'required|string|max:255',
        'pass_num' => 'required',
        'country' => 'required|string|max:255',
        'phone' => 'required|numeric',
        'social_phone' => 'nullable|numeric',
        'permanent_address' => 'required|string|max:255',
        'district' => 'required|string|max:255',
        'police_station' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'account_no' => 'required|numeric',
        'bank_name' => 'required|string|max:500',
        'branch' => 'required|string|max:255',
        'account_holder' => 'required|string|max:255',
        'loan_amount' => 'required|numeric|min:1000',
        'repayment_period' => 'required|string',
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'signature' => 'required|image|max:2048',
        'guarantor_name' => 'required|string|max:255',
        'guarantor_father_name' => 'required|string|max:255',
        'guarantor_mother_name' => 'required|string|max:255',
        'guarantor_nid' => 'required|numeric',
        'guarantor_thana' => 'required|string|max:255',
        'guarantor_zilla' => 'required|string|max:255',
        ]);

        LoanApplication::newLoanApplications($request);
        $this->toastr->success('Your application has been successful. Our Bangladeshi representive will contact within 24 hours.!');
        return back();
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
    //    return redirect()->route('withdraw.success')->with('success', 'Withdrawal requests are not permitted at this stage');
       return redirect()->route('withdraw.success');
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