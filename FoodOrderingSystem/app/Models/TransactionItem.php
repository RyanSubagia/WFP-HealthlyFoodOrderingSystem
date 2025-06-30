<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $table = 'transaction_items';
    protected $fillable = [
        'transaction_id',
        'food_id',
        'size',
        'note',
        'quantity',
        'price',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
