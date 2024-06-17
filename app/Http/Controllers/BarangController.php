<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{

    //halamanutama
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Barang::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $data = Barang::all();
        }

        return view('user/index', compact('data'));
    }


    public function read(Request $request)
    {
        $this->middleware('admin')->only('read');

        if ($request->has('search')) {
            $data = Barang::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5)->appends(['search' => $request->search]);
        } else {
            $data = Barang::paginate(5);
        }

        return view('admin/read', ['data' => $data]);
    }


    //editdata
    public function tampilkandata($id)
    {
        $data = Barang::find($id);
        return view('tampilkandata', compact('data'));
    }

    public function updatedata(request $request, $id)
    {
        $data = Barang::find($id);
        $data->update($request->all());
        return redirect()->route('read')->with('success', 'Data Berhasil Di Update');
    }

    //hapusdata
    public function delete($id)
    {
        $data = Barang::find($id);
        $data->delete();
        return redirect()->route('read')->with('success', 'Data Berhasil Di Delete');
    }

    //tambahdata
    public function tambahdata(Request $request)
    {
        return view('admin/tambahdata');
    }

    public function insertdata(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'harga' => 'required|string|max:255',
            'jumlah' => 'required|string|max:255',
            'foto' => 'required',
            'deskripsi' => 'required|string|max:255',

        ]);

        $data = Barang::create($request->all());

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotodata/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('read')->with('success', 'Data Berhasil Di Tambahkan');
    }



    //fiturlainnya

    public function gallery(Request $request)
    {
        if ($request->has('search')) {
            $data = Barang::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $data = Barang::all();
        }

        return view('user/gallery', compact('data'));
    }

    public function show($id)
    {
        $product = Barang::findOrFail($id);
        return view('user/product', compact('product'));
    }
    public function about()
    {
        return view('user/about');
    }

    public function contact()
    {
        return view('user/contact');
    }
}
