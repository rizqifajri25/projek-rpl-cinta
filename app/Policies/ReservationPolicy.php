<?php
namespace App\Policies;
use App\Models\{User,CulinaryPlace,Review,Reservation,Favorite};
class ReservationPolicy{public function update(User $u,Reservation $r){return $u->hasRole('admin_dinas')||$r->user_id===$u->id||$r->culinaryPlace->owner_id===$u->id;} public function delete(User $u,Reservation $r){return $this->update($u,$r);}}
