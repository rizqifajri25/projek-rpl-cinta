<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    
    protected $fillable=['name','slug','description','icon','status'];
    public function culinaryPlaces(){return $this->hasMany(CulinaryPlace::class);}
}
