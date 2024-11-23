<?php

namespace App\Http\Controllers\Admin;

use App\Models\Statements;
use App\Http\Controllers\Controller;
use Flasher\Toastr\Prime\ToastrInterface;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class StatementController extends Controller
{
    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->middleware('auth');
        $this->toastr = $toastr;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $statements = Statements::all();
            return DataTables::of($statements)
                ->addIndexColumn()
                ->addColumn('bank_statements', function ($row) {
                    if ($row->bank_statements) {
                        return '<a href="' . asset($row->bank_statements) . '" download class="btn btn-sm btn-success">
                                    <i class="fa fa-download"></i> Download PDF
                                </a>';
                    }
                    return 'No file uploaded';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '
                        <a href="javascript:void(0)" class="btn btn-primary btn-sm edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                            <i class="fa fa-trash"></i>
                        </button>
                        <form id="delete-form-' . $row->id . '" action="' . route('admin.statement.destroy', $row->id) . '" method="POST" style="display: none;">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                        </form>';
                    return $actionBtn;
                })
                ->rawColumns(['bank_statements', 'action'])
                ->make(true);
        }

        return view('admin.bank.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_statements' => 'nullable|mimes:pdf|max:2048',
            'document_name' => 'required|string|max:500',
        ]);

        Statements::newStatement($request);
        $this->toastr->success('Statement added successfully!');
        return back();
    }

    public function edit(Statements $statements)
    {
        return view('admin.bank.edit', compact('statements'));
    }

    public function update(Request $request, Statements $statements)
    {
        $request->validate([
            'bank_statements' => 'nullable|mimes:pdf|max:2048',
            'document_name' => 'required|string|max:500',
        ]);

        Statements::updateStatement($request, $statements);
        $this->toastr->success('Statement updated successfully!');
        return back();
    }

    public function destroy(Statements $statements)
    {
        // Call the delete method from the model
        $result = Statements::deleteStatement($statements);

        if ($result) {
            $this->toastr->success('Statement deleted successfully!');
        } else {
            $this->toastr->error('Failed to delete statement!');
        }

        return back();
    }
    
}
