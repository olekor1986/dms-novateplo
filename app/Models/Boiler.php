<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boiler extends Model
{
    use HasFactory;

    const IN_WORK = 1;
    const NOT_IN_WORK = 0;

    const WATER = 1;
    const STEAM = 2;

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

    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updated_by_user()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    static function getBoilerInWorkStatus()
    {
        return [
            self::IN_WORK => 'Yes',
            self::NOT_IN_WORK => 'No',
        ];
    }

    public function getBoilerInWorkStatusAttribute()
    {
        if ($this->in_work === NULL) {
            return 'None';
        }
        return self::getBoilerInWorkStatus()[$this->in_work];
    }

    static function getBoilerEnergyCarrier()
    {
        return [
            self::WATER => 'Water',
            self::STEAM => 'Steam',
        ];
    }

    public function getBoilerEnergyCarrierAttribute()
    {
        if ($this->energy_carrier === NULL) {
            return 'None';
        }
        return self::getBoilerEnergyCarrier()[$this->energy_carrier];
    }
}
