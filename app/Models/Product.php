<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'index',
        'barcode',
        'quantity',
        'unit',
        'price',
        'currency',
        'description',
        'descriptionBis',
        'category_id',
        'priority',
        'vat_rate'
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function descriptions(): HasMany
    {
        return $this->hasMany(ProductDescription::class);
    }
}
