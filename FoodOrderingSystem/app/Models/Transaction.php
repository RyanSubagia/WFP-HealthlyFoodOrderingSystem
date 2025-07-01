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

    // app/Models/Transaction.php
    const STATUSES    = ['pending', 'processing', 'ready', 'completed'];
    const NEXT_STATUS = [
        'pending'     => 'processing',
        'processing'  => 'ready',
        'ready'       => 'completed',
        'completed'   => null,
    ];


    protected $fillable = [
        'users_id',
        'payments_id',
        'metode_Pemesanan',
        'no_meja',
        'total',
        'tgl_Pemesanan',
        'status',
    ];

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
        // return $this->hasMany(TransactionItem::class, 'transaction_id');
        return $this->hasMany(\App\Models\TransactionItem::class, 'transaction_id');
    }
}
