<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'category_id',
        'priority',
        'vat_rate'
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
