<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Exception;
use Image;

class ProductController extends Controller
{
    public function getProduct(){
    	$products = Product::allProducts();

    	return view('back.admin.pages.product')->with(['products' => $products]);
    }

    public function addProduct(Request $request){
    	$this->validate($request, [
    			'product' => 'required'
    		]);

    	$photo = $request->file('image');
        if(isset($photo)){
            $filename = "product_".time().".".$photo->getClientOriginalExtension();
            $completePath = 'uploads/products/'.$filename;
            Image::make($photo)->resize(500, 500)->save('./'.$completePath);
        }else{
            $completePath = null;
        }
    	try {
    		Product::insert([
    				'product'		=> $request->product,
    				'image'			=> $completePath,
    				'description'	=> $request->description,
    				'created_at'	=> date('Y-m-d')
    			]);

    		return redirect()->route('admin.product')->with('message', 'Product added successfully.');
    	} catch (Exception $e) {
    		dd($e);
    	}
    }

    public function getEditProduct($id){
    	$products 	= Product::allProducts();
    	$product 	= Product::getProduct($id);

    	return view('back.admin.pages.product')->with(['product' => $product, 'products' => $products]);
    }

    public function postEditProduct(Request $request, $id){
    	$this->validate($request, [
    			'product' => 'required'
    		]);

    	$photo = $request->file('image');
    	if(isset($photo)){
    		$filename = "avatar_".time().".".$photo->getClientOriginalExtension();
	        $completePath = 'uploads/products/'.$filename;
	        unlink('./'.Product::getProduct($id)->image);
	        Image::make($photo)->resize(500, 500)->save('./'.$completePath);
    	}else{
    		$completePath = Product::getProduct($id)->image;
    	}

    	try {
    		Product::where('id', '=', $id)
    				->update([
	    				'product'		=> $request->product,
	    				'image'			=> $completePath,
	    				'description'	=> $request->description,
	    				'created_at'	=> date('Y-m-d')
	    			]);

    		return redirect()->route('admin.product')->with('message', 'Product added successfully.');
    	} catch (Exception $e) {
    		dd($e);
    	}
    }

    public function delete($id){
    	$product = Product::getProduct($id);

    	if($product->image != ''){
    		unlink('./'.$product->image);
    	}

    	Product::where('id', '=', $id)->delete();

    	return redirect()->route('admin.product')->with('message', 'Product deleted successfully.');
    }
}
