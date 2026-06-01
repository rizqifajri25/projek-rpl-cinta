<?php
namespace App\Repositories\Eloquent;
use App\Contracts\Repositories\ReviewRepositoryInterface;use App\Models\Review;
class ReviewRepository implements ReviewRepositoryInterface{public function all(array $filters=[]){return Review::query()->latest()->paginate($filters['per_page']??15);}public function find(int $id){return Review::query()->findOrFail($id);}public function create(array $data){return Review::query()->create($data);}public function update(int $id,array $data){$model=$this->find($id);$model->update($data);return $model->refresh();}public function delete(int $id):bool{return (bool)$this->find($id)->delete();}}
