<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
        'food_id',
        'size',
        'note',
        'quantity',
        'shoyu',
        'wasabi',
        'gari',
        'togarashi',
        'ponzu',
        'mayones',
        'teriyaki',
        'chili_Oil',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
