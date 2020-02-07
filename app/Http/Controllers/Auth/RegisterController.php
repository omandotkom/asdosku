<?php

namespace App\Http\Controllers\Auth;

use App\Campus;
use App\Detail;
use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    //ini untuk dosen dan pengurus
    protected function register(Request $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'aktif',
            'role' => 'dosen',
        ]);
            $details = Detail::create([
                'user_id' => $user->id,
                'kampus' => $data['kampus'],
                'wa' => $data['wa'],
                'nik' => $data['nik'],
            ]);
            
            if ($details->exists) {
                return redirect('/dashboard');
            }
        
    }
    protected function registerasdosShow()
    {
        $services = Service::with('activities')->get();
        $campuses = Campus::all();
        //return $services;
        return view('backupmain.register2', ['services' => $services,'campuses'=>$campuses]);
    }
    protected function registerasdos(Request $data)
    {
        $services = Service::all();
        $preferensi = "";
        foreach ($services as $service) {
            $name = $service->id . "check";
            if (isset($data[$name])) {
                $preferensi = $preferensi . $service->name . ",";
            }
        }
        $preferensi = substr_replace($preferensi, "", -1);
         $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'belum_aktif',
            'role' => 'asdos',
        ]);
        if ($user->exists) {
            $details = Detail::create([
                'user_id' => $user->id,
                'kampus' => $data['kampus'],
                'wa' => $data['wa'],
                'semester' => $data['semester'],
                'jurusan' => $data['jurusan'],
                'alamat' => $data['alamat'],
                'prefer' => $preferensi,
                'gender' => $data['gender'],
            ]);
            
           if ($details->exists){
               return redirect('/dashboard');
           }
        }
    
    }
}
