<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Menu extends Model
{
    
    public $timestamps=false; protected $fillable=['culinary_place_id','name','description','price','image','status']; protected $casts=['price'=>'decimal:2'];
    public function culinaryPlace(){return $this->belongsTo(CulinaryPlace::class);}
}
