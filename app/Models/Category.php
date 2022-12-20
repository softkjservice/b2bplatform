<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'index',
        'categoryDescription',
        'parentCategory',
        'layotType',
        'active',
        'homePageActive',
        'image_path',
        'image_size'
    ];

}
