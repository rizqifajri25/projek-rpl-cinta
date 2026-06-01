<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class BusinessDocument extends Model
{
    
    public $timestamps=false; protected $fillable=['culinary_place_id','nib_file','ktp_file','uploaded_at']; protected $casts=['uploaded_at'=>'datetime'];
    public function culinaryPlace(){return $this->belongsTo(CulinaryPlace::class);}
}
