<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('product_name', 'like', '%' . \request('search') . '%')
            ->orWhere('category_id', 'like', '%' . \request('search') . '%');
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function product_stocks()
    {
        return $this->hasMany(ProductStock::class);
    }

//    public function sluggable(): array
//    {
//        return [
//            'product_slug' => [
//                'source' => 'product_name'
//            ]
//        ];
//    }
}
