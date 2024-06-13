<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'alamat',
        'telepon',
    ];

    // Relasi dengan user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
