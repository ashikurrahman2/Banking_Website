<?php

namespace App\Http\Controllers;

use App\Models\LoanApplication;
use App\Models\LoanType; // LoanType মডেল যোগ করা
use Illuminate\Http\Request;

class AdminLoanController extends Controller
{
       // Approve loan application
       public function approve($id)
       {
           $application = LoanApplication::findOrFail($id);
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
        
        // Loan Types ডেটা লোড করে পাঠানো হচ্ছে
        $loanTypes = LoanType::all();

        return view('admin.loan_applications.index', compact('applications', 'loanTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Loan Types ডেটা লোড করে পাঠানো হচ্ছে
        $loanTypes = LoanType::all();
        return view('admin.loan_applications.create', compact('loanTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'loan_type_id' => 'required|exists:loan_types,id', // Loan Type ID-এর বৈধতা যাচাই
            'F_name' => 'required|string|max:255',
            'M_name' => 'nullable|string|max:255',
            'spouse_name' => 'nullable|string|max:255',
            'd_birth' => 'nullable|date',
            'gender' => 'required|string|max:10',
            'pass_num' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'social_phone' => 'nullable|string|max:20',
            'permanent_address' => 'nullable|string|max:255',
            'dittrict' => 'nullable|string|max:255',
            'police_station' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'account_no' => 'nullable|string|max:255',
            'branch' => 'nullable|string|max:255',
            'account_holder' => 'nullable|string|max:255',
            'loan_amount' => 'required|numeric|min:0',
            'repayment_period' => 'required|integer|min:1',
            'guarantor_name' => 'nullable|string|max:255',
            'guarantor_father_name' => 'nullable|string|max:255',
            'guarantor_mother_name' => 'nullable|string|max:255',
            'guarantor_nid' => 'nullable|string|max:255',
            'guarantor_thana' => 'nullable|string|max:255',
            'guarantor_zilla' => 'nullable|string|max:255',
            'status' => 'nullable|string|in:pending,approved,rejected',
        ]);

        // Create new loan application
        LoanApplication::create([
            'loan_type_id' => $request->loan_type_id, // Loan Type ID সংরক্ষণ
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
            'dittrict' => $request->dittrict,
            'police_station' => $request->police_station,
            'email' => $request->email,
            'account_no' => $request->account_no,
            'branch' => $request->branch,
            'account_holder' => $request->account_holder,
            'loan_amount' => $request->loan_amount,
            'repayment_period' => $request->repayment_period,
            'guarantor_name' => $request->guarantor_name,
            'guarantor_father_name' => $request->guarantor_father_name,
            'guarantor_mother_name' => $request->guarantor_mother_name,
            'guarantor_nid' => $request->guarantor_nid,
            'guarantor_thana' => $request->guarantor_thana,
            'guarantor_zilla' => $request->guarantor_zilla,
            'status' => $request->status,
        ]);
        
        return redirect()->route('admin.loan.index')->with('success', 'Loan application created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $application = LoanApplication::findOrFail($id);
        return view('admin.loan_applications.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit($id)
    // {
    //     $application = LoanApplication::findOrFail($id);
    //     $loanTypes = LoanType::all(); // Loan Types ডেটা লোড করা
    //     return view('admin.loan_applications.edit', compact('application', 'loanTypes'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     $application = LoanApplication::findOrFail($id);

    //     // Validate the input data for update
    //     $request->validate([
    //         'loan_type_id' => 'required|exists:loan_types,id', // Loan Type ID-এর বৈধতা যাচাই
    //         'F_name' => 'nullable|string|max:255',
    //         'M_name' => 'nullable|string|max:255',
    //         'spouse_name' => 'nullable|string|max:255',
    //         'd_birth' => 'nullable|date',
    //         'gender' => 'nullable|string|max:10',
    //         'pass_num' => 'nullable|string|max:255',
    //         'country' => 'nullable|string|max:255',
    //         'phone' => 'nullable|string|max:20',
    //         'social_phone' => 'nullable|string|max:20',
    //         'permanent_address' => 'nullable|string|max:255',
    //         'dittrict' => 'nullable|string|max:255',
    //         'police_station' => 'nullable|string|max:255',
    //         'email' => 'nullable|email|max:255',
    //         'account_no' => 'nullable|string|max:255',
    //         'branch' => 'nullable|string|max:255',
    //         'account_holder' => 'nullable|string|max:255',
    //         'loan_amount' => 'nullable|numeric|min:0',
    //         'repayment_period' => 'nullable|integer|min:1',
    //         'guarantor_name' => 'nullable|string|max:255',
    //         'guarantor_father_name' => 'nullable|string|max:255',
    //         'guarantor_mother_name' => 'nullable|string|max:255',
    //         'guarantor_nid' => 'nullable|string|max:255',
    //         'guarantor_thana' => 'nullable|string|max:255',
    //         'guarantor_zilla' => 'nullable|string|max:255',
    //         'status' => 'nullable|string|in:pending,approved,rejected',
    //     ]);

    //     // Update loan application data
    //     $application->update([
    //         'loan_type_id' => $request->loan_type_id,
    //         'F_name' => $request->F_name,
    //         'M_name' => $request->M_name,
    //         'spouse_name' => $request->spouse_name,
    //         'd_birth' => $request->d_birth,
    //         'gender' => $request->gender,
    //         'pass_num' => $request->pass_num,
    //         'country' => $request->country,
    //         'phone' => $request->phone,
    //         'social_phone' => $request->social_phone,
    //         'permanent_address' => $request->permanent_address,
    //         'dittrict' => $request->dittrict,
    //         'police_station' => $request->police_station,
    //         'email' => $request->email,
    //         'account_no' => $request->account_no,
    //         'branch' => $request->branch,
    //         'account_holder' => $request->account_holder,
    //         'loan_amount' => $request->loan_amount,
    //         'repayment_period' => $request->repayment_period,
    //         'guarantor_name' => $request->guarantor_name,
    //         'guarantor_father_name' => $request->guarantor_father_name,
    //         'guarantor_mother_name' => $request->guarantor_mother_name,
    //         'guarantor_nid' => $request->guarantor_nid,
    //         'guarantor_thana' => $request->guarantor_thana,
    //         'guarantor_zilla' => $request->guarantor_zilla,
    //         'status' => $request->status,
    //     ]);

    //     return redirect()->route('admin.loan.index')->with('success', 'Loan application updated successfully!');
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //     $application = LoanApplication::findOrFail($id);
    //     $application->delete();
        
    //     return redirect()->route('admin.loan.index')->with('success', 'Loan application deleted successfully!');
    // }
}
