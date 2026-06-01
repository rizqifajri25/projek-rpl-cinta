<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;use Illuminate\Http\Request;use App\Services\{AuthService,UserService,CategoryService,CulinaryPlaceService,ReviewService,ReservationService,NotificationService};
class NotificationController extends Controller{public function index(Request $r){return $r->user()->notifications()->latest()->paginate();} public function read(Request $r,NotificationService $s){$s->markRead($r->user());return response()->json(['message'=>'notifications marked as read']);}}
