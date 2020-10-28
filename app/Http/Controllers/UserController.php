<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cerita;
use Illuminate\Support\Facades\Auth;
use App\Komentar;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $komentar= Komentar::where('id_user', Auth::user()->id)->get();
        $cerita = Cerita::where('id_user', Auth::user()->id)->get();
        return view('item.profil', compact('cerita', 'komentar'));
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
            'nama' => 'required|max:50',
            'penname' => 'required|max:50',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user= User::where('id', $id)->update([
            'name'=>$request['nama'],
            'pena'=>$request['penname'],
            'email'=>$request['email'],
            'password'=> Hash::make($request['password'])
        ]);
        
        return redirect('/profil')->with(['success' => 'Profil Berhasil Diubah']);
    }
}
