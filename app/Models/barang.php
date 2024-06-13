<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
        'jumlah',
        'foto',
        'deskripsi'
    ];

    // Fixing relationship naming for consistency
    public function carts()
    {
        return $this->hasMany(Cart::class, 'barang_id');
    }

    public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}

}
