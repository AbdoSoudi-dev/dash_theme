<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'buying_price',
        'selling_price',
        'images',
        'code',
        'brand_id',
        'category_id',
        'vendor_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }

}
