<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Slider;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
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
            $slider = Slider::all();
            return DataTables::of($slider)
                ->addIndexColumn() 
                ->addColumn('slide_image', function ($row) {
                    if ($row->slide_image) {
                        return '<img src="' . asset($row->slide_image) . '" alt="Slide image" class="img-fluid center-image" style="max-width: 40px; display: block; margin: 0 auto;">';
                    } else {
                        return 'No logo uploaded';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionbtn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm me-1 edit" data-id="' . $row->id . '" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                    <button class="btn btn-danger btn-sm delete" data-id="' . $row->id . '">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                <form id="delete-form-' . $row->id . '" action="' . route('slider.destroy', $row->id) . '" method="POST" style="display: none;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                </form>';
                    return $actionbtn;
                })
                ->rawColumns(['slide_image', 'action'])
                ->make(true);
        }
        return view('admin.bank.slider.index');
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
            'slide_title' => 'required|string|max:255',
            'slide_subtitle' => 'required|string|max:255',
            'slide_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        Slider::newSlide($request);
        $this->toastr->success('Slider info Inserted successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.bank.slider.edit', compact('slider'));
    }
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'slide_title' => 'required|string|max:255',
            'slide_subtitle' => 'required|string|max:255',
            'slide_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        // Slider::updateSlide($request);
        // $this->toastr->success('Slider info updated successfully!');
        // return back();
        Slider::updateSlide($request, $slider);
        $this->toastr->success('slider info updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        $this->toastr->success('Slider info deleted successfully!');
        return back();
    }

}
