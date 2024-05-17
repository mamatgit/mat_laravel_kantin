<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Barang::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $data = Barang::all();
        }

        return view('index', compact('data'));
    }

    public function read()
    {
        $data=Barang::all();
        return view('read',compact('data'));
    }

    public function tampilkandata($id)
    {
        $data=Barang::find($id);
        return view('tampilkandata', compact('data'));
    }

    public function updatedata(request $request, $id){
        $data=Barang::find($id);
        $data->update($request->all());
        return redirect()->route('read')->with('success','Data Berhasil Di Update');
    }

    public function delete($id){
        $data=Barang::find($id);
        $data->delete();
        return redirect()->route('read')->with('success','Data Berhasil Di Delete');

    }

    public function tambahdata(Request $request)
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {
        $data = Barang::create($request->all());

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotodata/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('read')->with('success','Data Berhasil Di Tambahkan');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

}
