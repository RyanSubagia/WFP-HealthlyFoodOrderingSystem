<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payments extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function transactions():HasMany{
        return $this->hasMany(Transaction::class,'payments_id','id');
    }
    
}
