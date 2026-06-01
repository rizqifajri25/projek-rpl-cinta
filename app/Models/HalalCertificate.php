<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HalalCertificate extends Model
{
    
    public $timestamps=false; protected $fillable=['culinary_place_id','certificate_number','certificate_file','issued_date','expired_date','verification_status']; protected $casts=['issued_date'=>'date','expired_date'=>'date'];
    public function culinaryPlace(){return $this->belongsTo(CulinaryPlace::class);}
}
