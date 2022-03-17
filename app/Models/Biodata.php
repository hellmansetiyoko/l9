<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Biodata extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['user_id', 'phone', 'address'];

    protected $appends = [
        'name'
    ];

    protected function name(): Attribute
    {
        return new Attribute(
            get: fn () => ucfirst($this->user->name),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
