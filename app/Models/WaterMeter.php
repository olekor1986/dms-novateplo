<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterMeter extends Model
{
    use HasFactory;

    const WM_DIAMETERS = [
        15, 20, 25, 32, 40, 50, 65, 80, 100, 150, 200
    ];

    const WM_CONDITION_TYPES = [
        1 => 'In Work',
        2 => 'Failed',
        3 => 'Reserve',
    ];

    const WM_PURPOSE_TYPES = [
        1 => 'Cold Water',
        2 => 'Hot Water',
        3 => 'Booster Water',
    ];

    protected $guarded = false;

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function water_meter_values()
    {
        return $this->hasMany(WaterMeterValue::class);
    }

    static function getWaterMeterDiameters()
    {
        return self::WM_DIAMETERS;
    }

    static function getWaterMeterConditionTypes()
    {
        return self::WM_CONDITION_TYPES;
    }

    static function getWaterMeterPurposeTypes()
    {
        return self::WM_PURPOSE_TYPES;
    }

    public function getWaterMeterConditionAttribute()
    {
        $condition_types = self::WM_CONDITION_TYPES;
        foreach ($condition_types as $key => $type) {
            if ($this->condition == $key){
                return $type;
            }
        }
    }

    public function getWaterMeterPurposeAttribute()
    {
        $purpose_types = self::WM_PURPOSE_TYPES;
        foreach ($purpose_types as $key => $type) {
            if ($this->purpose == $key){
                return $type;
            }
        }
    }
}
