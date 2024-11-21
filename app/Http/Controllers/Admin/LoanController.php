<?php

namespace App\Http\Controllers\Admin;

use App\Models\Loans;
use App\Http\Controllers\Controller;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->middleware('auth');
        $this->toastr = $toastr;
    }
    public function index()
    {
        $loans= Loans::all();
        return view('admin.bank.loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'loan_type' => 'required|string|max:500',
        ]);
        Loans::newLoans($request);
        $this->toastr->success('Bank Loan Inserted successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Loans $loans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Loans $loans)
    {
        return view('admin.bank.edit', compact('loans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Loans $loans)
    {
        $request->validate([
            'loan_type' => 'required|string|max:500',
        ]);
        Loans::updateLoans($request, $loans);
        $this->toastr->success('Bank loan updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Loans $loans)
    {
        Loans::deleteLoans($loans);
        $this->toastr->success('Bank loan deleted successfully!');
        return back();
    }
}
