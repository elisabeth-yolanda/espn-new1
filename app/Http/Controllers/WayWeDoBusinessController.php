<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\WayWeDoBusiness;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class WayWeDoBusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('way_we_do_business.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $data = WayWeDoBusiness::find($request->id);
        $validasi = Validator::make($input,[
            'name' => 'required',
            'description' => 'required',
            'icon' => (!$data) ? 'required|' : ''. 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($validasi->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validasi->errors()->first()
            ]);
        }

        if($request->hasFile('icon')){
            $input['icon'] = upload_image($request->file('icon'), 'WayWeDoBusiness', Str::slug($request->name));
            if($data->image ?? null)
                File::delete($data->image);
        }

        if($data) {
            $data->update($input);
        } else {
            WayWeDoBusiness::create($input);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data saved successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = WayWeDoBusiness::find($id);

        if(!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = WayWeDoBusiness::find($id);
        if($data) {
            if($data->image ?? null)
                File::delete($data->image);
            $data->delete();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }

    public function dataTable(Request $request)
    {
        $data = WayWeDoBusiness::select('id', 'name', 'icon', 'created_at', 'description')
                        ->latest()
                        ->filter($request);

        return DataTables::of($data)
                            ->addindexColumn()
                           ->addColumn('content', function($data) {
                                $content = "<div class='row align-items-center'>
                                                <div class='col-md-4'>
                                                    <div role='button'  data-id='".$data->id."' class='text-dark hover-underline d-flex align-items-center btn-edit' style='gap: 10px'>
                                                        <div>
                                                            <img src='".asset($data->icon)."' class='img-fluid' alt='' style='height: 120px'>
                                                        </div>
                                                        <h6>
                                                            $data->name
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class='col-md-3 ml-auto d-flex flex-column text-left'>
                                                    <span>Created At</span>
                                                    <strong>".date('Y-m-d', strtotime($data->created_at))."</strong>
                                                </div>
                                                <div class='col-md-1'>
                                                    <div class='dropdown'>
                                                        <button class='btn btn-none' id='edit'.$data->id.'' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                            <i class='fas fa-ellipsis-v'></i>
                                                        </button>
                                                        <div class='dropdown-menu dropdown-menu-right border-0'>
                                                            <a class='dropdown-item btn-edit' data-id='".$data->id."'><i class='fas fa-pencil-alt text-primary pr-1' ></i> Edit</a>
                                                            <a class='dropdown-item btn-hapus' role='button' data-id='".$data->id."' data-nama='".$data->name."'>
                                                            <i class='fas fa-trash text-danger pr-1'></i> Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>";
                                return $content;
                           })->rawColumns(['content'])
                           ->smart(true)
                           ->make(true);

    }

    public function getAll(Request $request)
    {
        $data = WayWeDoBusiness::select('id', 'name', 'description', 'created_at', 'icon')
                            ->latest();

        if(isset($request->paginate))
            $data = $data->paginate($request->paginate)->toArray();

        if(isset($request->limit))
            $data = $data->limit($request->limit)->get();

        if(empty($request->paginate) && empty($request->limit))
            $data = $data->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
