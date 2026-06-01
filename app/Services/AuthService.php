<?php
namespace App\Services;
class AuthService{public function register(array $data){$data['password']=bcrypt($data['password']);$user=\App\Models\User::create($data);$user->assignRole('wisatawan');return ['user'=>$user,'token'=>$user->createToken('api')->plainTextToken];} public function login(array $credentials){if(!auth()->attempt($credentials)) abort(422,'Email atau password salah.');$user=auth()->user();return ['user'=>$user,'token'=>$user->createToken('api')->plainTextToken];}}
