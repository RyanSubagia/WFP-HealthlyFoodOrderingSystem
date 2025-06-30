<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionFact extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_id',
        'calories',
        'protein',
        'fat',
        'carbohydrates',
        'fiber'
    ];

    protected $casts = [
        'protein' => 'float',
        'fat' => 'float',
        'carbohydrates' => 'float',
        'fiber' => 'float',
    ];

    /**
     * Relasi dengan Food (belongs to)
     */
    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    /**
     * Accessor untuk format nutrition facts sebagai string
     */
    public function getFormattedNutritionAttribute()
    {
        $nutrition = [];
        
        if ($this->calories) {
            $nutrition[] = "Calories: {$this->calories} kkal";
        }
        if ($this->protein) {
            $nutrition[] = "Protein: {$this->protein}g";
        }
        if ($this->fat) {
            $nutrition[] = "Fat: {$this->fat}g";
        }
        if ($this->carbohydrates) {
            $nutrition[] = "Carbohydrates: {$this->carbohydrates}g";
        }
        if ($this->fiber) {
            $nutrition[] = "Fiber: {$this->fiber}g";
        }

        return implode("\n", $nutrition);
    }
}
