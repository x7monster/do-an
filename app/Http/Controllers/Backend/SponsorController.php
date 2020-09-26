<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Sponsor;

class SponsorController extends Controller
{
    public function view(){
    	$data['allData'] = Sponsor::all();
    	return view('backend.sponsor.view-sponsor',$data);
    }

    public function add(){
    	return view('backend.sponsor.add-sponsor');
    }

    public function store(Request $request){
    	$data = new Sponsor();
    	if ($request->file('image')){
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/sponsor_images'), $filename);
    		$data['image']= $filename;
    	}
    	$data->save();
    	return redirect()->route('sponsors.view')->with('success','Data Insert Successfully');
    }

    public function edit($id){
    	$editData = Sponsor::find($id);
    	return view('backend.sponsor.edit-sponsor',compact('editData'));
    }

    public function update(Request $request,$id){
    	$data = Sponsor::find($id);
    	if ($request->file('image')){
    		$file = $request->file('image');
    		@unlink(public_path('upload/sponsor_images/'.$data->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/sponsor_images'), $filename);
    		$data['image']= $filename;
    	}
    	$data->save();
    	return redirect()->route('sponsors.view')->with('success','Data Updated Successfully');
    }

    public function delete($id){
    	$sponsor = Sponsor::find($id);
    	if (file_exists('public/upload/sponsor_images/' . $sponsor->image) AND ! empty($sponsor->image)) {
    		unlink('public/upload/sponsor_images/' . $sponsor->image);
    	}
    	$sponsor->delete();
    	return redirect()->route('sponsors.view')->with('success','Data Deleted Successfully');
    }
}
