<?php
namespace App\Policies;
use App\Models\{User,CulinaryPlace,Review,Reservation,Favorite};
class ReviewPolicy{public function update(User $u,Review $r){return $u->hasRole('admin_dinas')||$r->user_id===$u->id;} public function delete(User $u,Review $r){return $this->update($u,$r);}}
