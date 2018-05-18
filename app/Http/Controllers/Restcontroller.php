<?php

namespace App\Http\Controllers;



use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Mail\varifyEmail;
use Auth;
use Image;
use Session;

class Restcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('signup');
    }
    public function profile($id)
    {
        //
         if (Auth::id() != null) {
             $arrUser= User::findOrFail($id);
        return view('profile',compact('arrUser'));
         }
    }
     public function profiledit(Request $data)
    {
        
          $requestData = $data->all();
       
        //die;
         $rules = array(
                 'firstname' => 'required|string|max:255',
              'lastname' => 'required|string|max:255',
               //'phone' => 'required|numeric',
           // 'phone' => 'required|regex:/(01)[0-9]{9}/',
              'profilepic' => 'nullable | image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        
           
        );
        $validator = Validator::make($data->all(), $rules);
        if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::back()
                            ->withErrors($validator)->withInput();//
            ;
        } else {
         if($data->hasfile('profilepic')){
           $profilepic=$data->file('profilepic');
           $filename=time().'.'.$profilepic->getClientOriginalExtension();
          // Image::make($profilepic)->resize(300,300)->save(public_path('/uploads/avatar/',$filename));
            $profilepic->move(public_path().'/uploads/avatar/', $filename);
       
       }else
       {
       $filename=$data['prevprofile'];
       }
   
               $user = User::findOrFail($data->id);
       $user->update([
            'firstname' => $data['firstname'],
             'lastname' => $data['lastname'],
             'profilepic' => $filename,
             'phone' => $data['phone'],
              
        ]);
       return view('home');
        }
    }
    public function userlist()
    {
		$perPage = 25;
       
		//$admin_users = Admin::all(['id', 'name','email','user_type']);
		$arrUser = User::paginate($perPage);
		return View('userlist', compact('arrUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create(Request $data)
    {
       
          $requestData = $data->all();
       
        //die;
         $rules = array(
                 'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:55|unique:users',
            'password' => 'required|string|min:6|confirmed',
            // 'phone' => 'required|numeric',
           //'phone' => 'required|regex:/(01)[0-9]{9}/',
              'profilepic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        
           
        );
        $validator = Validator::make($data->all(), $rules);
        if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages();

            // redirect our user back to the form with the errors from the validator
            return Redirect::back()
                            ->withErrors($validator)->withInput();//
            ;
        } else {
       
       \Session::flash('status','Registered but varify your acctount to activate');
       if($data->hasfile('profilepic')){
           $profilepic=$data->file('profilepic');
           $filename=time().'.'.$profilepic->getClientOriginalExtension();
           //Image::make($profilepic)->resize(300,300)->save(public_path('/uploads/avatar/',$filename));
           $profilepic->move(public_path().'/uploads/avatar/', $filename);
       
       }
       $user= User::create([
            'firstname' => $data['firstname'],
             'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
             'profilepic' => $filename,
             'phone' => $data['phone'],
              'verification_code' => str_random(20)
        ]);
        //send verification mail to user
            //---------------------------------------------------------
       \Mail::to($user)->send(new varifyEmail($user));
        
        return redirect(route('varifyemail'));
        }
    
}
  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function varifyemail()
    {
        return view('varifyemail');
        
    }
    public function activate($id,$verificationcode)
    {
        $user = User::where(['id'=>$id,'verification_code'=>$verificationcode]);
        
        if($user)
        {
        User::where(['id'=>$id,'verification_code'=>$verificationcode])->update(['status'=>1,'verification_code'=>NULL]);
        
        return redirect()->route('login');
        }
        else{
        return ('Varification not done');
        }
    }
    public function home()
    {
        
        return view('home');
    }
}
