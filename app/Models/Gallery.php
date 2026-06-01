<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Gallery extends Model
{
    
    public $timestamps=false; protected $fillable=['culinary_place_id','image_path','caption','sort_order'];
    public function culinaryPlace(){return $this->belongsTo(CulinaryPlace::class);}
}
