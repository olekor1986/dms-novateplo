<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityDistrict extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function sources()
    {
        return $this->hasMany(Source::class);
    }
}
