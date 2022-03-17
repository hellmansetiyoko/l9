<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Biodata extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['user_id', 'phone', 'address'];

    protected $appends = [
        'name', 'role', 'email'
    ];

    protected function name(): Attribute
    {
        return new Attribute(
            get: fn () => ucfirst($this->user->name),
        );
    }

    protected function role(): Attribute
    {
        return new Attribute(
            get: fn () => Str::lower(Str::of($this->user->roleable_type)->basename()),
        );
    }

    protected function email(): Attribute
    {
        return new Attribute(
            get: fn () => Str::mask($this->user->email, '*', -15, 8),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
