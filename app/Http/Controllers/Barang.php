<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Barang extends Controller
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
            $barang = DB::table('daftar_barang')->paginate(10);
            return view ('barang/barang',['barang'=> $barang]);
        }
    }

    public function search(Request $request)
    {   
        $this->validate($request, [
            'limit' => 'integer',
        ]);

        $search = $request->search;
		$barang = DB::table('daftar_barang')
            ->where('nama_barang','like',"%".$search."%")
            ->orWhere('kode_barang','like',$search."%")
            ->paginate($request->limit ? $request->limit:10);
        $barang->appends($request->only('search','limit'));

		return view('barang/barang',['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang/barang_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('daftar_barang')->insert([
            'kode_barang' =>$request->kode_barang,
            'nama_barang' =>$request->nama_barang,
            'satuan' =>$request->satuan,
            'created_at'=> date('Y-m-d H:i:s')
            ]);
            return redirect('/barang/create')->with('alert-success','Data Added!');    
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
        $data = DB::table('daftar_barang')->where('id',$id)->get();
        return view ('barang/barang_edit',['barang'=> $data]);    
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
        DB::table('daftar_barang')->where('id',$id)->update([
            'kode_barang' =>$request->kode_barang,
            'nama_barang' =>$request->nama_barang,
            'satuan' =>$request->satuan,
            'updated_at'=> date('Y-m-d H:i:s')
            ]);
        return redirect('/barang')->with('alert-success','Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('daftar_barang')->where('id',$id)->delete();
        return redirect('/barang')->with('alert-success', 'Data Deleted!');
    }
}
