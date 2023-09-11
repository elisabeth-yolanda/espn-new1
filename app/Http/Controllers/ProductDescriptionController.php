<?php

namespace App\Http\Controllers;

use App\Models\ProductDescription;
use App\Models\ProductService;
use App\Models\ProductServiceDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductDescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product_description.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_description.create-update');
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
        $data = ProductService::find($request->id);
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => (!$data) ? 'required|' : ''. 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if($request->hasFile('image')){
            $input['image'] = upload_image($request->file('image'), 'ProductService', Str::slug($request->name));
            if($data->image ?? null)
                File::delete($data->image);
        }

        $productDetail = ProductService::updateOrCreate(['id' => $request->id], $input);

        $detailProduct = explode(' ', $request->productDetail);
        $productDetailData = ProductServiceDetail::whereIn('id', $detailProduct)
                                                    ->get();

         foreach($productDetailData as $data) {
            $data->product_service_id = $productDetail->id;
            $data->save();
        }

        return redirect(route('product-service.index'))->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ProductService::with('detailProduct')->findOrFail($id);
        $productDetail = implode(' ', $data->detailProduct->pluck('id')->toArray());

        return view('product_description.create-update', compact('data', 'productDetail'));
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
        $data = ProductService::with('detailProduct')->find($id);
        if(!$data) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found'
            ]);
        }

        if($data->image ?? null)
            File::delete($data->image);
        if(count($data->detailProduct ?? []) > 0) {
            foreach($data->detailProduct as $detail) {
                $detail->delete();
            }
        }

        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data deleted successfully'
        ]);
    }

    public function dataTable(Request $request)
    {
        $data = ProductService::select('id', 'name', 'description', 'created_at', 'image', 'order')
                        ->latest()
                        ->filter($request);

        return DataTables::of($data)
                            ->addindexColumn()
                           ->addColumn('content', function($data) {
                                $content = "<div class='row align-items-center'>
                                                <div class='col-md-4'>
                                                    <div role='button'  data-id='".$data->id."' class='text-dark hover-underline d-flex align-items-center btn-edit' style='gap: 10px'>
                                                        <div>
                                                            <img src='".asset($data->image)."' class='img-fluid' alt='' style='height: 80px'>
                                                        </div>
                                                        <h6>
                                                            $data->name
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class='col-md-4'>
                                                    <span>Description</span>
                                                    ".substr(strip_tags($data->description), 0,200).".....
                                                </div>
                                                <div class='col-md-3 ml-auto '>
                                                    <span>Created At</span>
                                                    <strong>".date('Y-m-d', strtotime($data->created_at))."</strong>
                                                </div>
                                                <div class='col-md-1'>
                                                    <div class='dropdown'>
                                                        <button class='btn btn-none' id='edit'.$data->id.'' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                            <i class='fas fa-ellipsis-v'></i>
                                                        </button>
                                                        <div class='dropdown-menu dropdown-menu-right border-0'>
                                                            <a class='dropdown-item' href='".route('product-service.edit', $data->id)."'><i class='fas fa-pencil-alt text-primary pr-1' ></i> Edit</a>
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

    public function productDataTable(Request $request)
    {
        $detailProduct = $request->productDetail;
        $data_id = explode(' ', $detailProduct);

        $data = ProductServiceDetail::select('id', 'name', 'image')
                                ->whereIn('id', $data_id)
                                ->latest();

        return DataTables::of($data)
                            ->addindexColumn()
                           ->addColumn('content', function($data) {
                                $content = "<div class='row align-items-center'>
                                                <div class='col-md-8'>
                                                    <div role='button' class='text-dark hover-underline'>
                                                        <div class='d-flex align-items-center'>
                                                            <div class='mr-2'>
                                                                <img src='".asset($data->image)."' class='img-fluid w-100' style='height: 100px; object-fit: cover;'>
                                                            </div>
                                                            <h6>
                                                                $data->name
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='col-md-4 text-right'>
                                                    <div role='button' class='btn-edit btn btn-primary btn-sm' data-id='".$data->id."'><i class='fas fa-pencil-alt pr-1' ></i></div>
                                                    <div role='button' data-id='$data->id'
                                                        data-title='$data->name'
                                                        data-sumber='detail'
                                                        class='d-inline-block px-2 py-1 btn-sm text-center btn-delete bg-danger'>
                                                        <i class='fas fa-trash'></i>
                                                    </div>
                                                </d>
                                            </div>";
                                return $content;
                           })->rawColumns(['content'])
                           ->smart(true)
                           ->make(true);

    }

    public function productDetail($id)
    {
        $data = ProductServiceDetail::find($id);
        if($data) {
            return response()->json([
                'status' => 'success',
                'data' => $data
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Data not found'
        ]);
    }

    public function storeProductDetail(Request $request)
    {
        $input = $request->all();
        $data = ProductServiceDetail::find($request->id);
        $validasi = Validator::make($input,[
            'name' => 'required',
            'imageInputDetail' => (!$data) ? 'required|' : ''. 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validasi->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validasi->errors()->first()
            ]);
        }

        if($request->hasFile('imageInputDetail')){
            $input['image'] = upload_image($request->file('imageInputDetail'), 'ProductService', Str::slug($request->name));
            if($data->image ?? null)
                File::delete($data->image);
        }

        if($data) {
            $data->update($input);
        } else {
            $data = ProductServiceDetail::create($input);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data saved successfully',
            'data' => $data->id
        ]);
    }

    public function productDetailDelete($id)
    {
        $data = ProductServiceDetail::find($id);
        if($data) {
            if($data->image ?? null)
                File::delete($data->image);
            $data->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data deleted successfully'
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Data not found'
        ]);
    }

    public function getAll(Request $request)
    {
        $data = ProductService::with('detailProduct')
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
