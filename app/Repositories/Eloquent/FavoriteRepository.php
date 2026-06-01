<?php
namespace App\Repositories\Eloquent;
use App\Contracts\Repositories\FavoriteRepositoryInterface;use App\Models\Favorite;
class FavoriteRepository implements FavoriteRepositoryInterface{public function all(array $filters=[]){return Favorite::query()->latest()->paginate($filters['per_page']??15);}public function find(int $id){return Favorite::query()->findOrFail($id);}public function create(array $data){return Favorite::query()->create($data);}public function update(int $id,array $data){$model=$this->find($id);$model->update($data);return $model->refresh();}public function delete(int $id):bool{return (bool)$this->find($id)->delete();}}
