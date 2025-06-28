<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductModel::all();
        return view("allProducts",compact('products'));
    }

    public function delete($product)
    {
        $singleProduct = ProductModel::where(["id"=>$product])->first();
        if($singleProduct == null)
        {
            die("Product Not Found");
        };

        $singleProduct->delete();

        return redirect()->back();
    }

    public function saveProduct(Request $request)

    {
        $request->validate([
            "name"=>"required|string|unique:products",
            "price"=>"required|numeric|min:1",
            "description"=>"required|string",
            "amount"=>"required|int|min:1",
            "image"=>"required|string|",
        ]);

        ProductModel::create([
            "name"=>$request->get("name"),
            "price"=>$request->get("price"),
            "description"=>$request->get("description"),
            "amount"=>$request->get("amount"),
            "image"=>$request->get("image"),
        ]);

        return redirect("/admin/all-products");

    }

    public function edit($id)
    {
        $product = ProductModel::where(["id"=>$id])->first();
        if($product == null)
        {
            die("Product Not Found");
        }
        return view("edit-product",compact("product"));

    }

    public function update(Request $request,$id)
    {
        $request->validate([
            "name"=>"required|string|unique:products",
            "price"=>"required|numeric|min:1",
            "description"=>"required|string",
            "amount"=>"required|int|min:1",
            "image"=>"required|string|",
        ]);

        ProductModel::where(["id"=>$id])->update
        ([
            "name"=>$request->get("name"),
            "price"=>$request->get("price"),
            "description"=>$request->get("description"),
            "amount"=>$request->get("amount"),
            "image"=>$request->get("image"),
        ]);



        return redirect("/admin/all-products");

    }


}
