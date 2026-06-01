<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ReservationHistory extends Model
{
    
    protected $fillable=['reservation_id','old_status','new_status','changed_by'];
    public function reservation(){return $this->belongsTo(Reservation::class);}
    public function actor(){return $this->belongsTo(User::class,'changed_by');}
}
