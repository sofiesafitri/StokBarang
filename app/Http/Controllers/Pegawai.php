<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\ModelPegawai;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;

class Pegawai extends Controller
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
            $pegawai = DB::table('pegawai')->paginate(10);
            return view ('pegawai/pegawai',['pegawai'=> $pegawai]);
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
		$pegawai = DB::table('pegawai')
        ->where('nama','like',"%".$search."%")
        ->orWhere('id','like',"$search")
        ->orWhere('email','like',"%".$search."%")
        ->paginate($request->limit ? $request->limit:10);
        $pegawai->appends($request->only('search','limit'));
    		// mengirim data pegawai ke view index
		return view('pegawai/pegawai',['pegawai' => $pegawai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai/pegawai_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('pegawai')->insert([
            'id' =>$request->id,
            'nama' =>$request->nama,
            'jenis_kelamin' =>$request->jenis_kelamin,
            'alamat' =>$request->alamat,
            'no_telp' =>$request->no_telp,
            'email' =>$request->email,
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        return redirect('/pegawai/create')->with('alert-success','Data Added!');

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
        $data = DB::table('pegawai')->where('id',$id)->get();
        return view ('pegawai/pegawai_edit',['data'=> $data]);
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
        DB::table('pegawai')->where('id',$id)->update([
            'nama' =>$request->nama,
            'jenis_kelamin' =>$request->jenis_kelamin,
            'alamat' =>$request->alamat,
            'no_telp' =>$request->no_telp,
            'email' =>$request->email,
            'updated_at'=> date('Y-m-d H:i:s')
            ]);
        return redirect('/pegawai')->with('alert-success','Data Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('pegawai')->where('id',$id)->delete();
        return redirect('/pegawai')->with('alert-success', 'Data Deleted!');
    }

    
}
