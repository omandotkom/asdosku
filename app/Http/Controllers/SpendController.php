<?php

namespace App\Http\Controllers;

use App\Spend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SpendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spends = Spend::orderBy("updated_at","desc")->simplePaginate(10);
        return view('maindashboard.index', 
        ['spends' => $spends, 'title' => 'Daftar Pengeluaran', 'content' => 'pengeluaran']);
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'spenddate' => ['required', 'date'],
            'spendnote' => ['required'],
            'spendamount' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $spend = new Spend();
        $spend->amount = $request->spendamount;
        $spend->note = $request->spendnote;
        $spend->date = $request->spenddate;
        $spend->save();
        return back(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spend = Spend::findOrFail($id);
        $spend->delete();
        return back();
    }
}
