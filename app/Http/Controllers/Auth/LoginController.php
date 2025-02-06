<?php

namespace App\Http\Controllers\Auth;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [

            'email' => 'required',

            'password' => 'required',


        ]);

        if($validator->fails()) {

            return response()->json([

                'error' => $validator->errors()->all()

            ]);

        }else{

            // try {  

            //     $results = User::whereRaw('email',$request->email)
            //     ->first();
            //     Log::info('Login Fucntion');
            // }  
              
            // catch (Exception $e) {  
            //     Log::info('Invalid Username and password');
            //     return response()->json(['error'=>0,'mesaage'=>'Invalid Username and Password']); 
       
            // }  
       
            // finally {  
       
            //     if($results->roles == 1){
            //         $value = array('id'=>$results->id,'name'=>$results->name,'email'=>$results->email,'roles'=>$results->roles);
            //         Session::put('userDetails', $value);
            //         Log::info('Admin Login Fucntion');
            //         return response()->json(['roles'=>1]);


            //     }else if($results->roles == 2){

            //         $value = array('id'=>$results->id,'name'=>$results->name,'email'=>$results->email,'roles'=>$results->roles);
            //         Session::put('userDetails', $value);
            //         Log::info('Manager Login Fucntion');
            //         return response()->json(['roles'=>2]);

            //     }else if($results->roles == 3){

            //         $value = array('id'=>$results->id,'name'=>$results->name,'email'=>$results->email,'roles'=>$results->roles);
            //         Session::put('userDetails', $value);
            //         Log::info('User Login Fucntion');
            //         return response()->json(['roles'=>3]);

            //     }   
       
            // }  

            $results = User::where('email', $request->email)->first();

            try {

                if(!empty($results)){

                    if (Hash::check($request->password, $results->password)) {
                        $token = $results->createToken('login_token')->plainTextToken;
        
                        $expirationTime = 60 * 24 * 30; 
                        $results->tokens()->orderBy('created_at', 'desc')->first()->update(['remember_token' => now()->addMinutes($expirationTime)]);
                        $user = $results->fresh();
            
                        // return token, details with cookie
                        if($results->roles == 1){
                            $value = array('id'=>$results->id,'name'=>$results->name,'email'=>$results->email,'roles'=>$results->roles);
                            Session::put('userDetails', $value);
                            Log::info('Admin Login Fucntion');
                            return response()->json(['roles'=>1]);
        
        
                        }else if($results->roles == 2){
        
                            $value = array('id'=>$results->id,'name'=>$results->name,'email'=>$results->email,'roles'=>$results->roles);
                            Session::put('userDetails', $value);
                            Log::info('Manager Login Fucntion');
                            return response()->json(['roles'=>2]);
        
                        }else if($results->roles == 3){
        
                            $value = array('id'=>$results->id,'name'=>$results->name,'email'=>$results->email,'roles'=>$results->roles);
                            Session::put('userDetails', $value);
                            Log::info('User Login Fucntion');
                            return response()->json(['roles'=>3]);
        
                        }   
                    }

                }else{

                    return response()->json(['error'=>0,'message'=>'Invalid credentials']);    

                }

            }catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }

        }

    }

}
