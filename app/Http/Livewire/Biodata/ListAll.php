<?php

namespace App\Http\Livewire\Biodata;

use App\Models\Biodata;
use Livewire\Component;
use Livewire\WithPagination;

class ListAll extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.biodata.list-all',
            [
                'biodatas' => Biodata::paginate(10),
            ]);
    }
}
