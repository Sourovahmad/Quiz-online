<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class question extends Model
{
    use HasFactory, SoftDeletes;
    public function options()
    {
        return $this->hasMany(option::class);
    }
    public function answer()
    {
        return $this->hasOne(questionAnswer::class);
    }
}
