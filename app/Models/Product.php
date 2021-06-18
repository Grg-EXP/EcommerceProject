<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['title', 'description', 'price', 'image', 'slug'];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
