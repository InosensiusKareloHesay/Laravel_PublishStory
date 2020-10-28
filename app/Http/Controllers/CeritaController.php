<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cerita;
use App\Genre;
use App\Komentar;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use PDF;

class CeritaController extends Controller{
    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }

    public function index(){
        $cerita = Cerita::all();
        return view('item.explore', compact('cerita'));
    }

    public function create(){
        $genre = Genre::all();
        return view('item.cerita-create', compact('genre'));
    }

    public function store(Request $request){
        $request->validate([
            'judul' => 'required|max:100',
            'genre' => 'required',
            'cover' => 'required|image',
            'dekripsi' => 'required|max:255',
            'isi' => 'required',
            'user' => 'required'
        ]);

        $file = $request->file('cover');
        $extension = $file->extension();
        $file_name = time() . '.' . $extension;
        $file->move(public_path('img/uploads'), $file_name);
        
        $cerita= Cerita::create([
            'judul' => $request['judul'],
            'id_genre' => $request['genre'],
            'cover' => $file_name,
            'dekripsi' => $request['dekripsi'],
            'isi' => $request['isi'],
            'id_user' => $request['user']
        ]);
        
        return redirect('/profil')->with(['success' => 'Cerita Berhasil Ditambahkan']);
    }

    public function show($id){
        $cerita = Cerita::find($id);
        $komentar = Komentar::where('id_cerita',$id)->get();
        $id = Auth::user()->id;
        // $komentar= Komentar::where('id_cerita', $id)->get();
        // dd($komentar);
        return view('item.cerita-read', compact('cerita','komentar','id'));
    }

    public function edit($id){
        $genre = Genre::all();
        $cerita = Cerita::where('id', $id)->first();
        return view('item.cerita-edit', compact('cerita', 'genre'));
    }

    public function update(Request $request, $id){
        // dd($request);
        $request->validate([
            'judul' => 'required|max:100',
            'genre' => 'required',
            'cover' => 'image',
            'dekripsi' => 'required|max:255',
            'isi' => 'required',
            'user' => 'required'
        ]);
        
        $cerita = Cerita::where('id', $id)->first(); 
        $file = $request->file('cover');
        if ($file == '') {
            $file_name=$cerita->cover;
        } else {
            $extension = $file->extension();
            $file_name = time() . '.' . $extension;
            $file->move(public_path('img/uploads'), $file_name);
        }

        Cerita::where('id',$id)->update([
            'judul'=>$request['judul'],
            'id_genre'=>$request['genre'],
            'cover'=>$file_name,
            'dekripsi'=>$request['dekripsi'],
            'isi'=>$request['isi'],
            'id_user'=>$request['user']
        ]);

        return redirect('/profil')->with(['success' => 'Cerita Berhasil Diubah']);
    }

    public function destroy($id){
        // Cerita::find($id)->delete();
        Cerita::destroy($id);
        return redirect('/profil')->with(['success' => 'Cerita Berhasil Dihapus']);;
    }

    public function download($id)
    {
        $cerita = Cerita::where('id', $id)->first();
        $text = $cerita->isi;
        $isi = "ASDASDASD";
        $pdf = PDF::loadView('item.pdf', compact('text'));
        
        return $pdf->download('cerita.pdf');
    }
}
