<?php
namespace App\Repositories\Eloquent;
use App\Contracts\Repositories\CategoryRepositoryInterface;use App\Models\Category;
class CategoryRepository implements CategoryRepositoryInterface{public function all(array $filters=[]){return Category::query()->latest()->paginate($filters['per_page']??15);}public function find(int $id){return Category::query()->findOrFail($id);}public function create(array $data){return Category::query()->create($data);}public function update(int $id,array $data){$model=$this->find($id);$model->update($data);return $model->refresh();}public function delete(int $id):bool{return (bool)$this->find($id)->delete();}}
