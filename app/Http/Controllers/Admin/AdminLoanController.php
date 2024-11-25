<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanApplication;
use App\Models\User;
use App\Models\LoanType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminLoanController extends Controller
{
    // Approve loan application
    public function approve($id)
    {
        $application = LoanApplication::findOrFail($id);
        if ($application->status !== 'pending') {
            return redirect()->route('admin.loan.index')->with('error', 'This loan application cannot be approved.');
        }

        $user = User::find($application->user_id);
        if ($user) {
            $user->customer_balance += $application->loan_amount;
            $user->save();
        }

        $application->update(['status' => 'approved']);

        return redirect()->route('admin.loan.index')->with('success', 'Loan application approved successfully.');
    }

    // Reject loan application
    public function reject($id)
    {
        $application = LoanApplication::findOrFail($id);
        $application->update(['status' => 'rejected']);

        return redirect()->route('admin.loan.index')->with('success', 'Loan application rejected successfully.');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = LoanApplication::with('loanType')->paginate(10);
        $loanTypes = LoanType::all();

        return view('admin.loan_applications.index', compact('applications', 'loanTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'loan_type' => 'required|string',
            'F_name' => 'required|string|max:255',
            'M_name' => 'required|string|max:255',
            'spouse_name' => 'required|string|max:255',
            'd_birth' => 'required|date',
            'gender' => 'required|string',
            'pass_num' => 'nullable|string|max:50',
            'country' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'social_phone' => 'required|numeric',
            'permanent_address' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'police_station' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'account_no' => 'required|string|max:50',
            'branch' => 'required|string|max:255',
            'account_holder' => 'required|string|max:255',
            'loan_amount' => 'required|numeric',
            'repayment_period' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'signature' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'guarantor_name' => 'required|string|max:255',
            'guarantor_father_name' => 'required|string|max:255',
            'guarantor_mother_name' => 'required|string|max:255',
            'guarantor_nid' => 'required|string|max:50',
            'guarantor_thana' => 'required|string|max:255',
            'guarantor_zilla' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // File upload for photo
        $photoPath = $request->file('photo')->store('photos', 'public');

        // File upload for signature
        $signaturePath = $request->file('signature')->store('signatures', 'public');

        // Save data to the database
        $loanApplication = LoanApplication::create([
            'loan_type' => $request->loan_type,
            'F_name' => $request->F_name,
            'M_name' => $request->M_name,
            'spouse_name' => $request->spouse_name,
            'd_birth' => $request->d_birth,
            'gender' => $request->gender,
            'pass_num' => $request->pass_num,
            'country' => $request->country,
            'phone' => $request->phone,
            'social_phone' => $request->social_phone,
            'permanent_address' => $request->permanent_address,
            'district' => $request->district,
            'police_station' => $request->police_station,
            'email' => $request->email,
            'account_no' => $request->account_no,
            'branch' => $request->branch,
            'account_holder' => $request->account_holder,
            'loan_amount' => $request->loan_amount,
            'repayment_period' => $request->repayment_period,
            'photo' => $photoPath,
            'signature' => $signaturePath,
            'guarantor_name' => $request->guarantor_name,
            'guarantor_father_name' => $request->guarantor_father_name,
            'guarantor_mother_name' => $request->guarantor_mother_name,
            'guarantor_nid' => $request->guarantor_nid,
            'guarantor_thana' => $request->guarantor_thana,
            'guarantor_zilla' => $request->guarantor_zilla,
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Loan application submitted successfully!');
    }
}
