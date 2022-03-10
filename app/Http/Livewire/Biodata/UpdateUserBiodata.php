<?php

namespace App\Http\Livewire\Biodata;

use App\Models\Biodata;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateUserBiodata extends Component
{

    public $state = [];

    public function mount()
    {
        $this->state = Biodata::where('user_id', Auth::id())->first()->toArray();
    }

    public function updateUserBiodata()
    {
        Auth::user()->biodata->update($this->state);
    }
    public function render()
    {
        return view('livewire.biodata.update-user-biodata');
    }
}
