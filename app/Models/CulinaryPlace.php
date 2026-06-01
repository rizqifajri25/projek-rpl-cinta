<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CulinaryPlace extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'owner_id', 'category_id', 'name', 'slug', 'description', 'address', 'district',
        'city', 'province', 'postal_code', 'latitude', 'longitude', 'phone', 'website',
        'average_price', 'open_time', 'close_time', 'halal_status', 'verification_status',
        'featured', 'view_count', 'rating_average', 'rating_total',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
        'average_price' => 'decimal:2',
        'rating_average' => 'decimal:2',
        'open_time' => 'datetime:H:i',
        'close_time' => 'datetime:H:i',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function documents()
    {
        return $this->hasOne(BusinessDocument::class);
    }

    public function halalCertificates()
    {
        return $this->hasMany(HalalCertificate::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class)->orderBy('sort_order');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
