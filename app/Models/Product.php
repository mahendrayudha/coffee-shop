<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];

    // protected $fillable = [
    //     'name',
    //     'description',
    //     'price',
    //     'image',
    // ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
