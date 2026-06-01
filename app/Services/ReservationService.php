<?php

namespace App\Services;

use App\Contracts\Repositories\ReservationRepositoryInterface;

class ReservationService
{
    public function __construct(private ReservationRepositoryInterface $reservations)
    {
    }

    public function create(array $data)
    {
        return $this->reservations->create($data);
    }

    public function transition(int $id, string $status, ?int $actor = null)
    {
        $reservation = $this->reservations->find($id);
        $oldStatus = $reservation->status;

        $reservation->update([
            'status' => $status,
            'confirmed_by' => $actor,
        ]);

        $reservation->histories()->create([
            'old_status' => $oldStatus,
            'new_status' => $status,
            'changed_by' => $actor,
        ]);

        return $reservation->refresh();
    }
}
