<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoilerFuel extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function boilers()
    {
        return $this->hasMany(Source::class);
    }
}
