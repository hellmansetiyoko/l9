<?php

namespace App\Http\Livewire\Teacher;

use App\Repositories\TeacherRepository;
use Livewire\Component;

class ManageTeacher extends Component
{
    public function render(TeacherRepository $repository)
    {
        return view('livewire.teacher.manage-teacher', ['teachers' => $repository->getAll()]);
    }
}
