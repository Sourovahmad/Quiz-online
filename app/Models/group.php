<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class group extends Model
{
    use HasFactory, SoftDeletes;
    public function admins()
    {
        return $this->hasMany(User::class)->where('role_id', 2);
    }
    public function sub_admins()
    {
        return $this->hasMany(User::class)->where('role_id', 3);
    }
    public function students()
    {
        return $this->hasMany(User::class)->where('role_id', 4);
    }
}
