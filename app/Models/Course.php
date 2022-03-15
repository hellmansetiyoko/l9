<?php

namespace App\Models;

use App\Repositories\Enums\CoursesNameEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $cast =[
        'name' => CoursesNameEnum::class,
    ];

    public function teachers()
    {
        return $this->belongsTo(Teacher::class);
    }

}
