<?php
namespace App\Notifications;
use Illuminate\Notifications\Notification;use Illuminate\Notifications\Messages\BroadcastMessage;
class SmwkpDatabaseNotification extends Notification{public function __construct(public string $title,public string $message,public string $type){} public function via($notifiable){return ['database','broadcast'];} public function toArray($notifiable){return ['title'=>$this->title,'message'=>$this->message,'type'=>$this->type];} public function toBroadcast($notifiable){return new BroadcastMessage($this->toArray($notifiable));}}
