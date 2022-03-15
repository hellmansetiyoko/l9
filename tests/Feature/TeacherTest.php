<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Teacher;
use App\Repositories\Enums\StrataEnum;
use Database\Seeders\TeacherSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherTest extends TestCase
{

    use RefreshDatabase;
    public function test_teacher_can_be_create_and_assingned_to_user()
    {
        $this->withExceptionHandling();
        $this->post(route('teacher.create'),[
            'nip' =>"123",
            'strata' => StrataEnum::S1->value,
            'campus_name' => 'uin',
            'email' => User::factory()->create()->email,
        ]);

        $this->assertDatabaseHas('teachers', [
            'nip' =>"123",
            'strata' => StrataEnum::S1->value,
            'campus_name' => 'uin'
        ]);

        $this->assertCount(1, Teacher::all());
        $this->assertCount(1, User::all());

    }

    public function test_teacher_can_be_update()
    {
        $this->seed(TeacherSeeder::class);
        $this->post(route('teacher.update', ['teacher' => Teacher::first()->nip]),[
            'nip' => '222',
            'campus_name' => 'test'
        ]);
        $this->assertEquals('test', Teacher::first()->campus_name);
        $this->assertEquals('222', Teacher::first()->nip);
        $this->assertEquals(User::first(), Teacher::first()->user);

    }
}
