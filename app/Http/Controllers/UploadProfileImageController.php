<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Archive;
use App\Bank;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UploadProfileImageController extends Controller
{
    public $path;
    public $dimensions;

    public function __construct()
    {
        //DEFINISIKAN PATH
        $this->path = storage_path('app/public/images');
        //DEFINISIKAN DIMENSI
        $this->dimensions = ['75', '245', '300'];
    }
    public function upload(Request $request)
    {
        $bank = Bank::where('user_id', Auth::user()->id)->first();
        $archive = Archive::where('user_id', Auth::user()->id)->first();
        if ($request->hasFile('cv')) {
            $validator = Validator::make($request->all(), [
                'cv' => 'file|mimes:pdf|max:5000',
            ]);
            if ($validator->fails()) {

                $error = $validator->errors()->first();
                return redirect()->back()->with(['error' => $error]);
            }
            $cv_path = $request->file('cv')->store('cv/' . Auth::user()->id, 'public');
            Archive::where('user_id',Auth::user()->id)->update(['cv_path' => $cv_path]);
            //$archive->cv_path = $cv_path;
        }
        if ($bank != null) {
            $bank->delete();
        }
        $bank = new Bank();
        $bank->user_id = Auth::user()->id;
        $bank->nama = $request->nama;
        $bank->nomor = $request->nomor;
        $bank->payment = $request->payment;
        $bank->save();
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        //JIKA FOLDERNYA BELUM ADA
        if (!File::isDirectory($this->path)) {
            //MAKA FOLDER TERSEBUT AKAN DIBUAT
            File::makeDirectory($this->path);
        }


        //MENGAMBIL FILE IMAGE DARI FORM
        $file = $request->file('image');
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

        //SIMPAN DATA IMAGE YANG TELAH DI-UPLOAD
        $archive->image_name = $fileName;
        $archive->image_path = $this->path;

        $archive->save();

        $image_url = asset('storage/images/75');
        $image_url = $image_url . "/" . $archive->image_name;

        //return $image_url;

        //update data bank
        return redirect()->back()->with(['success' => 'Berhasil memperbarui biodata.', 'imgurl' => $image_url, 'bank' => $bank,'archive' => $archive]);
    }
}
