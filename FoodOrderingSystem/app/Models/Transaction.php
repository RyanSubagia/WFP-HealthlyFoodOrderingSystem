<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function payments(): BelongsTo
    {
        return $this->belongsTo(Payments::class, 'payments_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function items()
    {
        return $this->hasMany(TransactionItem::class, 'transaction_id');
    }
}
