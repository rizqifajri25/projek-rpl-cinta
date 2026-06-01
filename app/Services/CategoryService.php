<?php
namespace App\Services;
class CategoryService{public function __construct(private \App\Contracts\Repositories\CategoryRepositoryInterface $categories){} public function list(array $f=[]){return $this->categories->all($f);} public function create(array $d){$d['slug']=\Illuminate\Support\Str::slug($d['name']);return $this->categories->create($d);} public function update(int $id,array $d){if(isset($d['name']))$d['slug']=\Illuminate\Support\Str::slug($d['name']);return $this->categories->update($id,$d);} public function delete(int $id){return $this->categories->delete($id);}}
