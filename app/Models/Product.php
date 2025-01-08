<?php

namespace App\Models;


use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    use HasSlug;

    protected $fillable = ['category_id','brand_id','name','slug','images','description','price','is_active','is_featured','in_stock','on_sale'];

    protected $casts = ['images' => 'array'];


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function ordersItems(): HasMany{
        return $this->hasMany(OrderItem::class);
    }

}
