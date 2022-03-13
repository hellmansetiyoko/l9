<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\Biodata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Livewire\Biodata\UpdateUserBiodata;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserBiodataTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_form_biodata_is_avaliable()
    {
        $user = User::factory()->create();
        Biodata::create(['user_id' => $user->id]);

        $this->actingAs($user);
        $this->get(route('profile.show'))->assertSeeLivewire(UpdateUserBiodata::class);
    }

    public function test_user_biodata_can_update()
    {

        $user = User::factory()->create();
        Biodata::create(['user_id' => $user->id]);

        Livewire::actingAs($user)->test(UpdateUserBiodata::class)
                ->set('state', ['phone' => '031-111' , 'address' => 'test address'])
                ->call('updateUserBiodata');

        $this->assertEquals('031-111', $user->fresh()->biodata->phone);
        $this->assertEquals('test address', $user->fresh()->biodata->address);
    }

    public function test_field_biodata_is_required()
    {

        $user = User::factory()->create();
        Biodata::create(['user_id' => $user->id]);

        Livewire::actingAs($user)->test(UpdateUserBiodata::class)
                ->set('state', ['phone' => '' , 'address' => 'test address'])
                ->call('updateUserBiodata')
                ->assertHasErrors(['phone' => 'required']);

    }
}
