<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class  Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'end_txt',
        'title_type',
        'end_txt_type',
        'penetration_type'
    ];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
