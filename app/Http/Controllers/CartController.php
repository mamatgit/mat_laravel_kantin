<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Barang;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Tampilkan semua item di keranjang pengguna saat ini
    public function index()
    {
        $user = Auth::user();
        $carts = Cart::with('barang')->where('user_id', $user->id)->get();
        return view('user/cart', compact('carts'));
    }

    // Tambahkan produk ke keranjang
    public function add(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:barangs,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $barang = Barang::findOrFail($request->id);

        // Cek apakah produk sudah ada di keranjang
        $existingCart = Cart::where('user_id', $user->id)
            ->where('barang_id', $request->id)
            ->first();

        if ($existingCart) {
            // Update jumlah dan harga total jika produk sudah ada
            $existingCart->quantity += $request->quantity;
            $existingCart->totalharga = $existingCart->quantity * $barang->harga;
            $existingCart->save();
        } else {
            // Tambahkan produk baru ke keranjang
            Cart::create([
                'user_id' => $user->id,
                'barang_id' => $request->id,
                'quantity' => $request->quantity,
                'totalharga' => $request->quantity * $barang->harga,
            ]);
        };

        return redirect()->route('cart.index')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    //update produk
    public function update(Request $request, Cart $cart)
    {
        // Ensure that the cart item belongs to the current user
        if ($cart->user_id !== Auth::id()) {
            return redirect()->route('cart.index')->with('error', 'Unauthorized action.');
        }

        // Validate the input
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        // Calculate the new total price based on the updated quantity
        $cart->quantity = $request->input('quantity');
        $cart->totalharga = $cart->quantity * $cart->barang->harga;

        // Save the updated cart item
        $cart->save();

        return redirect()->route('cart.index')->with('success', 'Item quantity updated.');
    }

    // Hapus produk dari keranjang
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')
            ->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

    public function checkout(Request $request)
    {
        // Ambil data yang dibutuhkan dari request
        $selectedItems = $request->input('selected_items');

        // Proses untuk menghapus produk yang dipilih dari keranjang belanja
        $selectedItemsArray = explode(',', $selectedItems);

        foreach ($selectedItemsArray as $itemId) {
            // Hapus item dari keranjang belanja berdasarkan ID
            $item = Cart::find($itemId);
            if ($item) {
                $item->delete();
            }
        }

        // Kembalikan respon yang sesuai, misalnya, redirect kembali ke halaman keranjang belanja
        return redirect()->route('cart.index')->with('success', 'Items checked out successfully!');
    }
}
