<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\News;

class NewController extends Controller
{
    public function view(){
    	$data['allData'] = News::all();
    	return view('backend.news.view-news',$data);
    }

    public function add(){
    	return view('backend.news.add-news');
    }

    public function store(Request $request){
    	$data = new News();
        $data->created_at = $request->created_at;
    	$data->title = $request->title;
    	$data->description = $request->description;
    	$data->content = $request->content;
    	if ($request->file('image')){
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/news_images'), $filename);
    		$data['image']= $filename;
    	}
    	$data->save();
    	return redirect()->route('news.view')->with('success','Data Insert Successfully');
    }

    public function edit($id){
    	$editData = News::find($id);
    	return view('backend.news.edit-news',compact('editData'));
    }

    public function update(Request $request,$id){
    	$data = News::find($id);
    	$data->title = $request->title;
        $data->updated_at = $request->updated_at;
    	$data->description = $request->description;
    	$data->content = $request->content;
    	if ($request->file('image')){
    		$file = $request->file('image');
    		@unlink(public_path('upload/news_images/'.$data->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/news_images'), $filename);
    		$data['image']= $filename;
    	}
    	$data->save();
    	return redirect()->route('news.view')->with('success','Data Updated Successfully');
    }

    public function delete($id){
    	$contact = News::find($id);
    	$contact->delete();
    	return redirect()->route('news.view')->with('success','Data Deleted Successfully');
    }

}
