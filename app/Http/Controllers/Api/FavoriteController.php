<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;use Illuminate\Http\Request;use App\Services\{AuthService,UserService,CategoryService,CulinaryPlaceService,ReviewService,ReservationService,NotificationService};
class FavoriteController extends Controller{public function index(Request $r){return $r->user()->favorites()->with('culinaryPlace')->paginate();} public function store(Request $r){return \App\Models\Favorite::firstOrCreate($r->validate(['culinary_place_id'=>'required|exists:culinary_places,id'])+['user_id'=>$r->user()->id]);} public function destroy(\App\Models\Favorite $favorite){$this->authorize('delete',$favorite);$favorite->delete();return response()->noContent();}}
