<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Logika untuk halaman admin
        return view('');
    }
    public function cartadmin(Request $request)
    {
        $this->middleware('admin')->only('cart');

        if ($request->has('search')) {
            $data = Cart::where('user_id', 'LIKE', '%'. $request->search. '%')->paginate(3)->appends(['search' => $request->search]);;
        } else {
            $data = Cart::paginate(3);
        }

        return view('cartadmin', ['data' => $data]);
    }

    public function usersadmin(Request $request)
    {
        $this->middleware('admin')->only('cart');

        if ($request->has('search')) {
            $data = User::where('name', 'LIKE', '%'. $request->search. '%')->paginate(3)->appends(['search' => $request->search]);
        } else {
            $data = User::paginate(3);
        }

        return view('usersadmin', ['data' => $data]);
    }
}
