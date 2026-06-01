<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Reservation extends Model
{
    
    protected $fillable=['user_id','culinary_place_id','reservation_date','reservation_time','guest_count','note','status','confirmed_by']; protected $casts=['reservation_date'=>'date','reservation_time'=>'datetime:H:i','guest_count'=>'integer'];
    public function user(){return $this->belongsTo(User::class);}
    public function culinaryPlace(){return $this->belongsTo(CulinaryPlace::class);}
    public function confirmer(){return $this->belongsTo(User::class,'confirmed_by');}
    public function histories(){return $this->hasMany(ReservationHistory::class);}
}
