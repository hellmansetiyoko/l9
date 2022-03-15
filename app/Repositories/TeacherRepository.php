<?php

namespace App\Repositories;

use App\Models\Teacher;

class TeacherRepository
{

    public function getAll()
    {
        return $this->format(Teacher::all())->toArray();
    }

    public function format($data)
    {
        return $data->map(function($item, $key){
                return [
                'name' => $item->user->name ?? 'no name',
                'strata' => $item->strata->value,
                ];
            });
    }
}
