<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alergi extends Model
{
    use HasFactory;
    protected $table = 'alergi';
    protected $primaryKey = 'idAlergi';
    public $timestamps = true;
}
