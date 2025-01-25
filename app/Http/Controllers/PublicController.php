<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('created_at','desc')->paginate(20);

        return view('product',[
            'products' =>$products
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_name' => 'required|string',
                'quantity' => 'required|integer',
                'price' => 'required|numeric',
            ]);

            $data = [
                'product_name' => $request->product_name,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'total_value' => $request->quantity * $request->price,
            ];

            $jsonFile = 'products.json';

            $products = Storage::exists($jsonFile) ? json_decode(Storage::get($jsonFile), true) : [];
            $products[] = $data;
            Storage::put($jsonFile,json_encode($products));

            Product::create($data);

            $request->session()->flash('success', 'Product created successfully');
        } catch (\Exception $e){

            $request->session()->flash('error', 'Failed to create product Error:'.$e);
        }



        return redirect()->back();
    }

    public function edit(Request $request, $pid)
    {
        try{
            $product = Product::findorfail($pid);
            $product->update($request->all());

            $jsonFile = "products.json";

            $products = Storage::exists($jsonFile) ? json_decode(Storage::get($jsonFile), true) : [];
            $products[$request->index] = $request->all();
            Storage::put($jsonFile, json_encode($products));

            $request->session()->flash('success', 'Product updated successfully');
        } catch (\Exception $e){

            $request->session()->flash('error', 'Failed to update product Error:'.$e);
        }


        return redirect()->back();
    }
}
