<?php
namespace App\Policies;
use App\Models\{User,CulinaryPlace,Review,Reservation,Favorite};
class CulinaryPlacePolicy{public function update(User $u,CulinaryPlace $p){return $u->hasRole('admin_dinas')||$p->owner_id===$u->id;} public function delete(User $u,CulinaryPlace $p){return $this->update($u,$p);}}
