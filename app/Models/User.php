<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;use Illuminate\Notifications\Notifiable;use Laravel\Sanctum\HasApiTokens;use Spatie\Permission\Traits\HasRoles;use Illuminate\Database\Eloquent\SoftDeletes;
class User extends Authenticatable
{
    use HasApiTokens, HasRoles, Notifiable, SoftDeletes;
    protected $fillable=['name','email','phone','avatar','password','status'];
    protected $hidden=['password','remember_token'];
    protected $casts=['email_verified_at'=>'datetime','password'=>'hashed'];
    public function culinaryPlaces(){return $this->hasMany(CulinaryPlace::class,'owner_id');}
    public function favorites(){return $this->hasMany(Favorite::class);}
    public function favoritePlaces(){return $this->belongsToMany(CulinaryPlace::class,'favorites');}
    public function reviews(){return $this->hasMany(Review::class);}
    public function reservations(){return $this->hasMany(Reservation::class);}
    public function notifications(){return $this->hasMany(SmwkpNotification::class);}
}
