<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Logo;
use App\Model\Slider;
use App\Model\Contact;
use App\Model\About;
use App\Model\Communicate;
use App\Model\ProductSubImage;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\News;
use App\Model\Sponsor;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrId = [];

        foreach(session('wishlists', []) as $key) {
            array_push($arrId, (int) $key);
        }

        $products = Product::find($arrId);

        $data['logo'] = Logo::first();
    	$data['contact'] = Contact::first();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['news'] = News::first();
        $data['about'] = About::first();
        $data['products'] = $products;

        return view('frontend.single_pages.wish-lists', $data);
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
        if (empty(session('wishlists'))) {
            session('wishlists', []);
        }

        $product = Product::findOrFail($request->id);

        session()->put("wishlists.$request->id", $request->id);

        return response()->json(['success' => 'Thêm vào danh sách yêu thích thành công', 
            'product' => $product->name]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $product = Product::findOrFail($id);

        session()->forget("wishlists.$id");

        return response()->json(['success' => 'Xóa khỏi danh sách yêu thích thành công', 
            'product' => $product->name]);
    }
}
