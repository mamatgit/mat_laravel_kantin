<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Logika untuk halaman admin
        return view('read');
    }
    public function cartadmin(Request $request)
    {
        $this->middleware('admin')->only('cart');

        if ($request->has('search')) {
            $data = Cart::where('nama', 'LIKE', '%'. $request->search. '%')->get();
        } else {
            $data = Cart::paginate(10);
        }

        return view('cartadmin', ['data' => $data]);
    }
}
