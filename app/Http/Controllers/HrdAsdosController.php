<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
class HrdAsdosController extends Controller
{
    public function index(Request $request)
    {
    	$strWhere = "u.name != 'null'";

    	if($request->has("column") && $request->column == "nama"){
    		 $strWhere = "u.name LIKE '%".$request->keyword."%'";
		}
		if($request->has("column") && $request->column == "email"){
    		 $strWhere = "u.email LIKE '%".$request->keyword."%'";
		}
		if($request->has("column") && $request->column == "status"){
    		 $strWhere = "u.status = '".$request->keyword."'";
		}
		if($request->has("column") && $request->column == "wa"){
    		 $strWhere = "d.wa = '".$request->keyword."'";
		}
		if($request->has("column") && $request->column == "wa"){
    		 $strWhere = "d.wa = '".$request->keyword."'";
		}
		if($request->has("column") && $request->column == "kampus"){
    		 $strWhere = "k.name LIKE '%".$request->keyword."%'";
		}
		if($request->has("column") && $request->column == "jurusan"){
    		 $strWhere = "j.name LIKE '%".$request->keyword."%'";
		}
		// dd($strWhere);

    	$users =  DB::table('users as u')
    				->join('details as d','u.id','=','d.user_id')
    				->join('kampus as k','d.kampus_id','k.id')
    				->join('jurusans as j','d.jurusan_id','j.id')
    				->select('u.id','u.name','u.email','u.status','d.wa','k.name as kampus','j.name as jurusan','d.domisili')
    				->where('u.role','=','asdos')
    				->whereRaw($strWhere)
    				->paginate(10);
        return view('maindashboard.index', ['users' => $users, 'content' => 'asdoshrdlist','title' => "Daftar Asdos"]);
    }
    public function detail($id)
    {
    		$user =  DB::table('users as u')->where('u.id','=',$id)->first();
            $detail = DB::table('details')->where('user_id',$id)->first();
            $jurusan = DB::table('jurusans')->where('id',$detail->jurusan_id)->first();
            $kampus = DB::table('kampus')->where('id',$detail->kampus_id)->first();
            $data = DB::table('archives')->where('user_id',$id)->first();
             // dd($kampus);
    		return view('maindashboard.index', ['user' => $user, 'detail'=>$detail,'jurusan'=>$jurusan, 'kampus'=>$kampus, 'data'=>$data, 'content' => 'asdosdetailview','title' => "Detail Asdos"]);
    }
}
