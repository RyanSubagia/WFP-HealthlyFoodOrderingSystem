<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar_Alergi extends Model
{
    use HasFactory;
    protected $table = 'daftar_alergi';

    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'users_id',
        'idAlergi',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    // Relasi ke model Alergi
    public function alergi(){

        return $this->belongsTo(Alergi::class, 'idAlergi', 'idAlergi');
    }
}
