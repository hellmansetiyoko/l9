<?php

namespace App\Actions\Biodata;

use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UpdateBiodataInformation
{
    public function update(User $user, array $inputs)
    {
        Validator::make($inputs, [
            'phone' => 'required',
            'address' => 'required',
            'about' => 'required',
        ])->validate();
        $user->biodata->update($inputs);
    }
}
