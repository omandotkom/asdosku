<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UploadKtpDosenController extends Controller
{
	public function __construct()
    {
        //DEFINISIKAN PATH
        $this->path = storage_path('app/public/images/dosenidentity');
        //DEFINISIKAN DIMENSI
        $this->dimensions = ['75', '245', '300'];
    }


    public function index()
    {
    	  $detail = Detail::where('user_id',Auth::user()->id)->first();
    	  return view('maindashboard.index', ['content' => 'uploadktp', 'title' => 'Upload KTP Dosen','detail' => $detail]);
    }
    public function postUpload(Request $request)
    {
    		$this->validate($request, [
			'identitas' => 'required|file|image|mimes:jpeg,png,jpg|max:3048',
			'kampus_dosen' => 'required',
			'wa' => 'required|numeric',
			'nik' => 'required|numeric'
			]);


			$detail = Detail::where('user_id',Auth::user()->id)->first();
			$detail->kampus_dosen = $request->kampus_dosen;
			$detail->wa = $request->wa;
			$detail->nik = $request->nik;


	        if (!File::isDirectory($this->path)) {
	            //MAKA FOLDER TERSEBUT AKAN DIBUAT
	            File::makeDirectory($this->path);
	        }

			$file = $request->file('identitas');
	        //MEMBUAT NAME FILE DARI GABUNGAN TIMESTAMP DAN UNIQID()
	        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
	        //UPLOAD ORIGINAN FILE (BELUM DIUBAH DIMENSINYA)
	        Image::make($file)->save($this->path . '/' . $fileName);

	        //LOOPING ARRAY DIMENSI YANG DI-INGINKAN
	        //YANG TELAH DIDEFINISIKAN PADA CONSTRUCTOR
	        foreach ($this->dimensions as $row) {
	            //MEMBUAT CANVAS IMAGE SEBESAR DIMENSI YANG ADA DI DALAM ARRAY 
	            $canvas = Image::canvas($row, $row);
	            //RESIZE IMAGE SESUAI DIMENSI YANG ADA DIDALAM ARRAY 
	            //DENGAN MEMPERTAHANKAN RATIO
	            $resizeImage  = Image::make($file)->resize($row, $row, function ($constraint) {
	                $constraint->aspectRatio();
	            });

	            //CEK JIKA FOLDERNYA BELUM ADA
	            if (!File::isDirectory($this->path . '/' . $row)) {
	                //MAKA BUAT FOLDER DENGAN NAMA DIMENSI
	                File::makeDirectory($this->path . '/' . $row);
	            }

	            //MEMASUKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
	            $canvas->insert($resizeImage, 'center');
	            //SIMPAN IMAGE KE DALAM MASING-MASING FOLDER (DIMENSI)
	            $canvas->save($this->path . '/' . $row . '/' . $fileName);
	        }

	        $detail->identitas = $fileName;
	        $detail->save();
	        return redirect()->route('indexdosen');
	       
 
    }
}
