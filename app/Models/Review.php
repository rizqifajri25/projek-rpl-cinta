<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Review extends Model
{
    
    protected $fillable=['user_id','culinary_place_id','rating','review_text','status']; protected $casts=['rating'=>'integer'];
    public function user(){return $this->belongsTo(User::class);}
    public function culinaryPlace(){return $this->belongsTo(CulinaryPlace::class);}
    public function images(){return $this->hasMany(ReviewImage::class);}
    public function replies(){return $this->hasMany(ReviewReply::class);}
    public function reports(){return $this->hasMany(ReviewReport::class);}
}
