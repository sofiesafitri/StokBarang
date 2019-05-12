<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Sales extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::get('login')){
            return redirect('')->with('alert','You Should Login First');
        }
        else{
            $sales = DB::table('sales')->paginate(10);
            return view ('sales/sales',['sales'=> $sales]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {   
        $this->validate($request, [
            'limit' => 'integer',
        ]);
        $search = $request->search;
		$sales = DB::table('sales')
        ->where('nama','like',"%".$search."%")
        ->orWhere('id','like',"$search")
        ->orWhere('no_identitas','like',"%".$search."%")
        ->paginate($request->limit ? $request->limit:10);
        $sales->appends($request->only('search','limit'));

		return view('sales/sales',['sales' => $sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales/sales_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('sales')->insert([
            'no_identitas' =>$request->no_identitas,
            'nama' =>$request->nama,
            'alamat' =>$request->alamat,
            'kota' =>$request->kota,
            'telepon' =>$request->telepon,
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        return redirect('/sales/create')->with('alert-success','Data Added!');

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
        $data = DB::table('sales')->where('id',$id)->get();
        return view ('sales/sales_edit',['data'=> $data]);
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
        DB::table('sales')->where('id',$id)->update([
            'nama' =>$request->nama,
            'alamat' =>$request->alamat,
            'kota' =>$request->kota,
            'telepon' =>$request->telepon,
            'updated_at'=> date('Y-m-d H:i:s')
            ]);
        return redirect('/sales')->with('alert-success','Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('sales')->where('id',$id)->delete();
        return redirect('/sales')->with('alert-success', 'Data Deleted!');
    }
}
