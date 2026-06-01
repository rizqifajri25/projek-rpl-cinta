<?php
namespace App\Policies;
use App\Models\{User,CulinaryPlace,Review,Reservation,Favorite};
class FavoritePolicy{public function delete(User $u,Favorite $f){return $f->user_id===$u->id;}}
