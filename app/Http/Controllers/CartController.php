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
        return view('cart', compact('carts'));
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

// Perbarui jumlah produk di keranjang
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart->update([
            'quantity' => $request->quantity,
            'totalharga' => $cart->quantity * $cart->barang->harga,
        ]);

        return redirect()->route('cart.index')
        ->with('success', 'Keranjang berhasil diperbarui.');
    }

    // Hapus produk dari keranjang
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')
        ->with('success', 'Produk berhasil dihapus dari keranjang.');
    }

//produk tampil
    public function show($id)
{
    $product = Barang::findOrFail($id);
    return view('product', compact('product'));
}

public function cart() {
    $carts = Cart::with('barang')->where('user_id', auth()->id())->get();
    return view('keranjang', compact('carts'));
}


//checkout
public function checkout(Request $request)
{
    // Validasi barang yang dipilih
    $selectedItems = $request->input('selected_items');
    if (empty($selectedItems)) {
        return redirect()->route('cart.index')->with('error', 'Tidak ada barang yang dipilih untuk checkout.');
    }

    DB::beginTransaction();
    try {
        $totalPrice = 0;
        $orderItems = [];

        foreach ($selectedItems as $cartId) {
            $cart = Cart::find($cartId);

            if (!$cart) {
                return redirect()->route('cart.index')->with('error', 'Barang dalam keranjang tidak ditemukan.');
            }

            $product = $cart->barang; // Asumsi relasi ke model barang
            if ($product->stock < $cart->quantity) {
                return redirect()->route('cart.index')->with('error', "Stok untuk barang {$product->nama} tidak mencukupi.");
            }

            // Mengurangi stok barang
            $product->stock -= $cart->quantity;
            $product->save();

            // Hitung total harga
            $totalPrice += $cart->quantity * $product->harga;

            // Persiapkan data item pesanan
            $orderItems[] = [
                'product_id' => $product->id,
                'quantity' => $cart->quantity,
                'price' => $product->harga,
                'total_price' => $cart->quantity * $product->harga,
            ];

            // Hapus item dari keranjang
            $cart->delete();
        }

        // Simpan data pesanan
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->total_price = $totalPrice;
        $order->status = 'Pending'; // Sesuaikan dengan logika status yang Anda gunakan
        $order->save();

        // Simpan item pesanan
        foreach ($orderItems as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->total_price = $item['total_price'];
            $orderItem->save();
        }

        DB::commit();

        return redirect()->route('order.confirmation')->with('success', 'Checkout berhasil!');

    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->route('cart.index')->with('error', 'Terjadi kesalahan saat memproses checkout: ' . $e->getMessage());
    }
}
}
