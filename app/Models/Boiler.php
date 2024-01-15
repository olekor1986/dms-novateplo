<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boiler extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function boiler_fuel()
    {
        return $this->belongsTo(BoilerFuel::class);
    }

    public function burner_type()
    {
        return $this->belongsTo(BurnerType::class);
    }
}
