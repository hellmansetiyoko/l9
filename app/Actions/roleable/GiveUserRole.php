<?php

namespace App\Actions\Roleable;

use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;

class GiveUserRole

{

    public function setAsAdmin(User $user, array $inputs)
    {
        $user->update($this->setRoleable(roleable : Admin::firstOrCreate($inputs)));
    }

    public function setAsTeacher(User $user, array $inputs)
    {
        $user->update($this->setRoleable(roleable : Teacher::firstOrCreate($inputs)));
    }

    public function setAsStudent(User $user, array $inputs)
    {
        $user->update($this->setRoleable(roleable : Student::firstOrCreate($inputs)));
    }

    protected function setRoleable($roleable)
    {
        return [
            'roleable_id' => $roleable->id,
            'roleable_type' => get_class($roleable),
        ];
    }

}
