<?php

namespace App\Http\Livewire\Biodata;

use App\Actions\Biodata\UpdateBiodataInformation;
use App\Models\Biodata;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UpdateUserBiodata extends Component
{

    public $state = [];


    public function mount()
    {
        $this->state = Biodata::where('user_id', Auth::id())->first()->toArray();
    }


    public function updateUserBiodata(UpdateBiodataInformation $updater)
    {
        $updater->update(user: Auth::user(), inputs: $this->state);
        $this->emit('saved');
        $this->emit('refresh-navigation-menu');
    }
    public function render()
    {
        return view('livewire.biodata.update-user-biodata');
    }
}
