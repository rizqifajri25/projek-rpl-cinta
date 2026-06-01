<?php
namespace App\Services;
class UserService{public function __construct(private \App\Contracts\Repositories\UserRepositoryInterface $users){} public function updateProfile($user,array $data){$user->update($data);return $user->refresh();}}
