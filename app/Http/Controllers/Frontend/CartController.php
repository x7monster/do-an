<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Logo;
use App\Model\Slider;
use App\Model\Contact;
use App\Model\About;
use App\Model\News;
use App\Model\Communicate;
use App\Model\Product;
use App\Model\ProductSubImage;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\Size;
use App\Model\Color;
use Cart;

class CartController extends Controller
{
    public function addtoCart(Request $request){
    	$this->validate($request,[
    		'size_id' => 'required',
    		'color_id' => 'required'
    	]);
    	$product = Product::where('id',$request->id)->first();
    	$product_size = Size::where('id',$request->size_id)->first();
    	$product_color = Color::where('id',$request->color_id)->first();
    	Cart::add([
    		'id' => $product->id,
    		'qty' => $request->qty,
    		'price' => $product->price,
    		'name' => $product->name,
    		'weight' => 550,
    		'options' => [
    			'size_id' => $request->size_id,
    			'size_name' => $product_size->name,
    			'color_id' => $request->color_id,
    			'color_name' => $product_color->name,
    			'image' => $product->image
    		],
    	]);
    	return redirect()->route('show.cart')->with('success','Product added successsfully');
    }
    public function showCart(){
    	$data['logo'] = Logo::first();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
    	$data['contact'] = Contact::first();
    	return view('frontend.single_pages.shopping-cart',$data);
    }

    public function updateCart(Request $request){
    	Cart::update($request->rowId,$request->qty);
    	return redirect()->route('show.cart')->with('success','Product updated successsfully');
    }

    public function deleteCart($rowId){
    	Cart::remove($rowId);
    	return redirect()->route('show.cart')->with('success','Product deleted successsfully');
    }
}
