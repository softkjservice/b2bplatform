<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductDescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'htmlText',
    ];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
