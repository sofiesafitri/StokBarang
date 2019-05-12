<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InBarang extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   if(!Session::get('login')){
            return redirect('')->with('alert','You Should Login First');
        }
        else{
            $in = DB::table('in_barang AS x')
                ->join('daftar_barang AS a','x.id_barang','=','a.id')
                ->join('pegawai AS b','x.id_pegawai','=','b.id')
                ->paginate(10);
            return view ('InBarang/inbarang',['in'=> $in]);
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
        $in = DB::table('in_barang')
            ->join('daftar_barang AS a','id_barang','=','a.id')
            ->join('pegawai AS b','id_pegawai','=','b.id')
            ->where('id_barang','like',"%".$search."%")
            ->orWhere('no_sbm','like',"$search")
            ->orWhere('nama_barang','like',"%".$search."%")
            ->paginate($request->limit ? $request->limit:10);
        $in->appends($request->only('search','limit'));

		return view('InBarang/inbarang',['in' => $in]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = DB::table('daftar_barang')->get();
        $pegawai = DB::table('pegawai')->get();
        return view('InBarang/inbarang_create',['barang'=>$barang],['pegawai'=>$pegawai]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        DB::table('in_barang')->insert([
            'no_sbm' =>$request->no_sbm,
            'id_barang' =>$request->id_barang,
            'quantity' =>$request->quantity,
            'id_pegawai' =>$request->id_pegawai,
            'keterangan' =>$request->keterangan,
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        return redirect('/barang_in/create')->with('alert-success','Data Added!');

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
        $data = DB::table('in_barang')->where('id_in',$id)->get();
        $x = DB::table('pegawai')->get();
        $barang = DB::table('daftar_barang')->get();

        return view ('InBarang/inbarang_edit',['data'=> $data, 'x'=>$x],['barang'=>$barang]);
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
        DB::table('in_barang')->where('id_in',$id)->update([
            'id_barang' =>$request->id_barang,
            'quantity' =>$request->quantity,
            'id_pegawai' =>$request->id_pegawai,
            'keterangan' =>$request->keterangan,
            'updated_at'=> date('Y-m-d H:i:s')
            ]);
        return redirect('/barang_in')->with('alert-success','Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('in_barang')->where('id_in',$id)->delete();
        return redirect('/barang_in')->with('alert-success', 'Data Deleted!');
    }
}
