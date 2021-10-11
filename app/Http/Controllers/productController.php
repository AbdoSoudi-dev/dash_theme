<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\View;

class productController extends Controller
{

    public function index()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $vendors = Vendor::all();
        return view('products',compact('brands','categories','vendors'));
    }

    public function getProducts(Request $request)
    {
        if ($request->ajax()) {
            $data = product::with(['user','brand','vendor','category'])->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn =
                        '<div class="d-flex justify-content-between">
                             <a href="products/'.$row->id.'/edit" class="edit btn btn-success btn-sm">Edit</a>
                             <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>
                         </div>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


    }

    public function productsDatatable()
    {
        $products = product::with(['user','brand','vendor','category'])->get();
        return view('productsDatatable',compact('products'));
    }

    public function store(Request $request){

        $files = [];
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $file)
            {
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path().'/images/products/', $name);
                $files[] = $name;
            }
        }

        product::create([
            'images' => json_encode($files),
            'name' => $request->name,
            'quantity' => $request->quantity,
            'buying_price' => $request->buying_price,
            'selling_price' => $request->selling_price,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'vendor_id' => $request->vendor_id,
            'code' => $this->generateBarcodeNumber(),
        ]);

        return back()->with('success', 'Images uploaded successfully');

    }
    public function generateBarcodeNumber() {
        $number = mt_rand(1000000000, 9999999999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->barcodeNumberExists($number)) {
            return $this->generateBarcodeNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    public function barcodeNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return product::where('code',$number)->exists();
    }

}
