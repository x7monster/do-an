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
use App\User;
use DB;
use Mail;
use App\Model\Shipping;
use App\Model\Payment;
use App\Model\Order;
use App\Model\OrderDetail;
use Auth;
use Session;

class CheckoutController extends Controller
{
    public function customerLogin(){
    	$data['logo'] = Logo::first();
    	$data['contact'] = Contact::first();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
    	return view('frontend.single_pages.customer-login',$data);
    }

    public function customerSignup(){
    	$data['logo'] = Logo::first();
    	$data['contact'] = Contact::first();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
    	return view('frontend.single_pages.customer-signup',$data);
    }

    public function signupStore(Request $request){
        DB::transaction(function() use($request){
            $this->validate($request,[
            'name' => 'required',
            'email' => 'required|unique:users',
            'mobile' => ['required','unique:users,mobile'],
            'password' => 'min:9|required_with:password_confirmation|same:password_confirmation','
                password_confirmation' => 'min:9'
              ]);
            $code = rand(0000,9999);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = bcrypt($request->password);
            $user->code = $code;
            $user->status = '0';
            $user->usertype = 'customer';
            $user->save();

            $data = array(
                'email' => $request->email,
                'code' => $code
            );
            Mail::send('frontend.emails.verify-email',$data, function($message) use($data){
                $message->from('Hailbpd03253@fpt.edu.vn','Shop LBH99');
                $message->to($data['email']);
                $message->subject('Please verify your email address');
            });  
        });
        return redirect()->route('email.verify')->with('success','You have successfully signed up, please verify your email');
    }
    public function emailVerify(){
        $data['logo'] = Logo::first();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['contact'] = Contact::first();
        return view('frontend.single_pages.email-verify',$data);
    }

    public function verifyStore(Request $request){
        $this->validate($request,[
            'email' => 'required',
            'code' => 'required'
        ]);
        $checkData = User::where('email',$request->email)->where('code',$request->code)->first();
        if($checkData){
            $checkData->status = '1';
            $checkData->save();
            return redirect()->route('customer.login')->with('success','You have successfully verified, please login');
        }else{
            return redirect()->back()->with('error','Sorry! email or verification code does not match');
        }
    }

    public function checkOut(){
        $data['logo'] = Logo::first();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['contact'] = Contact::first();
        return view('frontend.single_pages.customer-checkout',$data);
    }

    public function checkoutStore(Request $request){
         $this->validate($request,[
            'name' => 'required',
            'mobile_no' => 'required',
            'address' => 'required'
        ]);

         $checkout = new Shipping();
         $checkout->user_id = Auth::user()->id;
         $checkout->name = $request->name;
         $checkout->email = $request->email;
         $checkout->mobile_no = $request->mobile_no;
         $checkout->address = $request->address;
         $checkout->save();
         Session::put('shipping_id',$checkout->id);
         return redirect()->route('customer.payment')->with('success','Data saved successfully');
    } 
}
