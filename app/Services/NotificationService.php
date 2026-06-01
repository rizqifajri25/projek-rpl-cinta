<?php
namespace App\Services;
class NotificationService{public function send(int $userId,string $title,string $message,string $type){return \App\Models\SmwkpNotification::create(compact('userId','title','message','type')+['user_id'=>$userId]);} public function markRead($user){return $user->notifications()->update(['is_read'=>true]);}}
