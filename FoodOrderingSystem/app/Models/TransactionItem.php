<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $table = 'transaction_items';

    protected $fillable = [
        'transaction_id',
        'food_id',
        'size',
        'note',
        'quantity',
        'price',
    ];

    // Relasi ke transaksi induk
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    // Relasi ke data makanan
    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }
}
