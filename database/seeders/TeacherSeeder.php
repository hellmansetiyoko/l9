<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\User;
use App\Repositories\Enums\CoursesNameEnum;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'teacher',
            'email' => 'teacher@app.com',
            'roleable_type'=>Teacher::class,
            'roleable_id' => Teacher::create([
                    'nip' => '123456789',
            ])->id,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $user->biodata()->create();


        Course::create([
            'teacher_id' => $user->fresh()->roleable_id,
            'name' => CoursesNameEnum::NONE,
        ]);
    }
}
