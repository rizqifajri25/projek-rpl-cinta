<?php
namespace App\Repositories\Eloquent;
use App\Contracts\Repositories\UserRepositoryInterface;use App\Models\User;
class UserRepository implements UserRepositoryInterface{public function all(array $filters=[]){return User::query()->latest()->paginate($filters['per_page']??15);}public function find(int $id){return User::query()->findOrFail($id);}public function create(array $data){return User::query()->create($data);}public function update(int $id,array $data){$model=$this->find($id);$model->update($data);return $model->refresh();}public function delete(int $id):bool{return (bool)$this->find($id)->delete();}}
