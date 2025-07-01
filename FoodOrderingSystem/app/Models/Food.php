<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image'
    ];

    /**
     * Relasi dengan Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi dengan NutritionFact (one-to-one)
     */
    public function nutritionFact()
    {
        return $this->hasOne(NutritionFact::class, 'food_id', 'id');
    }

    
    public function getFormattedNutritionAttribute()
    {
        if ($this->nutritionFact) {
            return $this->nutritionFact->formatted_nutrition;
        }
        return 'Informasi nutrisi tidak tersedia';
    }
}