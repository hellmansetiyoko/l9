<?php

namespace App\Actions\Biodata;

use App\Models\User;

class UpdateBiodataInformation
{
    public function update(User $user, array $inputs)
    {
        $user->biodata->update($inputs);
    }
}
