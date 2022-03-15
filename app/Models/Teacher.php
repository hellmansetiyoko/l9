<?php

namespace App\Models;

use App\Models\Course;
use App\Repositories\Enums\StrataEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['nip', 'strata', 'campus_name'];

    protected $casts = [
        'strata' => StrataEnum::class,
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'roleable');
    }

    public function lessons()
    {
        return $this->hasMany(Course::class);
    }

}
