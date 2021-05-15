<?php

namespace App\Http\Controllers\Auth;

use App\Archive;
use App\Campus;
use App\Detail;
use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Events\UserVerified;
use Illuminate\Support\Carbon;
use App\Jurusans;
use Illuminate\Support\Facades\Response;

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
        $validator = Validator::make($data->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'kampus' => ['required', 'string', 'min:3'],
            'nik' => ['required', 'min:5'],
            //this is optinal, so dosen always verified
            
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'aktif',
            'role' => 'dosen',
            'email_verified_at' =>  Carbon::now()->toDateTimeString()
        ]);
        $details = Detail::create([
            'user_id' => $user->id,
            'kampus_dosen' => $data['kampus'],
            'wa' => $data['wa'],
            'nik' => $data['nik'],
        ]);

        if ($details->exists) {
            return redirect('/dashboard');
        }
    }

    protected function registerasmahasiswa(Request $data)
    {
        $validator = Validator::make($data->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'kampus' => ['required', 'string', 'min:3'],
            'nik' => ['required', 'min:5'],
            //this is optinal, so dosen always verified
            
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => 'aktif',
            'role' => 'dosen',
            'subrole' => 'mahasiswa',
           // 'email_verified_at' =>  Carbon::now()->toDateTimeString()
        ]);
        $details = Detail::create([
            'user_id' => $user->id,
            'kampus_dosen' => $data['kampus'],
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
        $jurusans = Jurusans::orderBy('name', 'asc')->get();
        //return $services;
        return view('backupmain.register2', ['services' => $services, 'campuses' => $campuses, 'jurusans' => $jurusans]);
    }
    protected function registerasdos(Request $data)
    {
        $validator = Validator::make($data->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'wa' => ['required','min:10'],
            'semester' => ['required','string'],
            'jurusan' => ['required'],
            'alamat' => ['required','string','min:10']
            
            ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
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
                'kampus_id' => $data->kampus,
                'wa' => $data['wa'],
                'semester' => $data['semester'],
                'jurusan_id' => $data['jurusan'],
                'alamat' => $data['alamat'],
                'prefer' => $preferensi,
                'gender' => $data['gender'],
            ]);
            Archive::create(['user_id' => $user->id, 'image_name' => 'default.png','complete'=>false]);
            if ($details->exists) {
                return redirect('/dashboard');
            }
        }
    }
    public function addnewjurusan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namajurusanbaru' => 'bail|required||',

        ]);
        if ($validator->fails()) {
            //  return response('Gagal menambahkan jurusan, nama jurusan harus di isi.',400);
            return response("Gagal menambahkan " . $request->namajurusanbaru . " sebagai jurusan. Mohon hubungi kontak admin", 400);

            //      return redirect()->route('registerasdosShow')->with(["error" => "Gagal menambahkan jurusan karna kolom nama jurusan kosong."]);
        }

        $jurusan = Jurusans::firstOrCreate(['name' => $request->namajurusanbaru]);
        $listJurusan = Jurusans::orderBy('name','asc')->get();
        if ($jurusan) {
            return response()->json([
                'message' => "Berhasil menambahkan " . $jurusan->name . " sebagai jurusan",
                'listjurusan' => $listJurusan
            ]);
            //return response("Berhasil menambahkan " . $jurusan->name . " sebagai jurusan", 200);
            // return back()->with(["success" => "Berhasil menambahkan " . $request->name . " sebagai jurusan baru di Asdosu."]);
        }
    }
}
