<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;

class ListTeacher extends Component
{
    use WithPagination;

    // public $teachers;
    public function mount()
    {
        // $this->teachers = Te;
    }
    public function render()
    {
        return view('livewire.teacher.list-teacher',
        ['teachers' => Teacher::has('user')->paginate(10)]);
    }
}
