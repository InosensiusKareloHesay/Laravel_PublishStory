<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komentar;
use App\Cerita;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'user' => 'required',
            'cerita' => 'required',
            'isi' => 'required'
        ]);

        $komentar= Komentar::create([
            'isi'=>$request['isi'],
            'id_user'=>$request['user'],
            'id_cerita'=>$request['cerita']
        ]);
        
        return redirect()->back()->with(['success' => 'Berhasil Memberikan Komentar']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $komentar = Komentar::where('id', $id)->first();
        $cerita = Cerita::where('id',$komentar->id_cerita)->first();
        return view('item.editKomen', compact('cerita','komentar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'isi' => 'required'
        ]);

        $komentar= Komentar::where('id', $id)->update([
            'isi'=>$request['isi']
        ]);
        
        return redirect('/cerita')->with(['success' => 'Komentar Berhasil Diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        Komentar::destroy($id);
        return redirect()->back()->with(['success' => 'Komentar Berhasil Dihapus']);;
    }
}