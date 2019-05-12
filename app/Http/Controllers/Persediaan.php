<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Persediaan extends Controller
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
            $persediaan = DB::table('persediaan AS x')
                ->join('daftar_barang AS a','x.id_barang','=','a.id')
                ->paginate(10);
            return view ('persediaan/persediaan',['persediaan'=> $persediaan]);
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
        $persediaan = DB::table('persediaan')
            ->join('daftar_barang AS a','id_barang','=','a.id')
            ->where('id_barang','like',"%".$search."%")
            ->orWhere('id_persediaan','like',"$search")
            ->orWhere('nama_barang','like',"%".$search."%")
            ->paginate($request->limit ? $request->limit:10);
        $persediaan->appends($request->only('search','limit'));
		return view('persediaan/persediaan',['persediaan' => $persediaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = DB::table('daftar_barang')->get();
        return view('persediaan/persediaan_create',['barang'=>$barang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        DB::table('persediaan')->insert([
            'id_barang' =>$request->id_barang,
            'quantity' =>$request->quantity,
            'deskripsi' =>$request->deskripsi,
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        return redirect('/persediaan/create')->with('alert-success','Data Added!');

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
        $data = DB::table('persediaan')->where('id_persediaan',$id)->get();
        $barang = DB::table('daftar_barang')->get();

        return view ('persediaan/persediaan_edit',['data'=> $data],['barang'=>$barang]);
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
        DB::table('persediaan')->where('id_persediaan',$id)->update([
            'id_barang' =>$request->id_barang,
            'quantity' =>$request->quantity,
            'deskripsi' =>$request->deskripsi,
            'updated_at'=> date('Y-m-d H:i:s')
            ]);
        return redirect('/persediaan')->with('alert-success','Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('persediaan')->where('id_persediaan',$id)->delete();
        return redirect('/persediaan')->with('alert-success', 'Data Deleted!');
    }
}
