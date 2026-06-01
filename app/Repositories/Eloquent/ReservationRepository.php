<?php
namespace App\Repositories\Eloquent;
use App\Contracts\Repositories\ReservationRepositoryInterface;use App\Models\Reservation;
class ReservationRepository implements ReservationRepositoryInterface{public function all(array $filters=[]){return Reservation::query()->latest()->paginate($filters['per_page']??15);}public function find(int $id){return Reservation::query()->findOrFail($id);}public function create(array $data){return Reservation::query()->create($data);}public function update(int $id,array $data){$model=$this->find($id);$model->update($data);return $model->refresh();}public function delete(int $id):bool{return (bool)$this->find($id)->delete();}}
