<?php
namespace App\Repositories\Eloquent;
use App\Contracts\Repositories\CulinaryPlaceRepositoryInterface;use App\Models\CulinaryPlace;
class CulinaryPlaceRepository implements CulinaryPlaceRepositoryInterface{public function all(array $filters=[]){return CulinaryPlace::query()->latest()->paginate($filters['per_page']??15);}public function find(int $id){return CulinaryPlace::query()->findOrFail($id);}public function create(array $data){return CulinaryPlace::query()->create($data);}public function update(int $id,array $data){$model=$this->find($id);$model->update($data);return $model->refresh();}public function delete(int $id):bool{return (bool)$this->find($id)->delete();}}
