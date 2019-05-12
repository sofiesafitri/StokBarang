<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OutBarang extends Controller
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
            $out = DB::table('out_barang AS x')
                ->join('daftar_barang AS a','x.id_barang','=','a.id')
                ->join('sales AS b','id_sales','=','b.id')
                ->paginate(10);
            return view ('outBarang/outbarang',['out'=> $out]);
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
        $out = DB::table('out_barang')
            ->join('daftar_barang AS a','id_barang','=','a.id')
            ->join('sales AS b','id_sales','=','b.id')
            ->where('id_barang','like',"%".$search."%")
            ->orWhere('no_sbk','like',"$search")
            ->orWhere('nama_barang','like',"%".$search."%")
            ->paginate($request->limit ? $request->limit:10);
        $out->appends($request->only('search','limit'));

		return view('OutBarang/outbarang',['out' => $out]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = DB::table('daftar_barang')->get();
        $sales = DB::table('sales')->get();

        return view('OutBarang/outbarang_create',['barang'=>$barang],['sales'=>$sales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        DB::table('out_barang')->insert([
            'no_sbk' =>$request->no_sbk,
            'id_barang' =>$request->id_barang,
            'quantity' =>$request->quantity,
            'id_sales' =>$request->id_sales,
            'keterangan' =>$request->keterangan,
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        return redirect('/barang_out/create')->with('alert-success','Data Added!');

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
        $data = DB::table('out_barang')->where('id_out',$id)->get();
        $sales = DB::table('sales')->get();
        $barang = DB::table('daftar_barang')->get();

        return view ('OutBarang/outbarang_edit',['data'=> $data,'sales'=>$sales,'barang'=>$barang]);
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
        DB::table('out_barang')->where('id_out',$id)->update([
            'id_barang' =>$request->id_barang,
            'quantity' =>$request->quantity,
            'id_sales' =>$request->id_sales,
            'keterangan' =>$request->keterangan,
            'updated_at'=> date('Y-m-d H:i:s')
            ]);
        return redirect('/barang_out')->with('alert-success','Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('out_barang')->where('id_out',$id)->delete();
        return redirect('/barang_out')->with('alert-success', 'Data Deleted!');
    }
}
