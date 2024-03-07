<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeatingPipeline extends Model
{
    use HasFactory;

    const PIPE_DIAMETERS = [
        15, 25, 32, 40, 57, 76, 89, 108, 159, 219, 273, 325
    ];

    const PURPOSE_TYPES = [
        1 => 'Heating',
        2 => 'Hot Water',
        3 => 'Steam',
    ];

    const LAYING_TYPES = [
        1 => 'Underground',
        2 => 'Aboveground',
    ];

    const INS_TYPES = [
        1 => 'Mineral Wool',
        2 => 'Pre-Isolation',
    ];

    const INS_CONDITIONS = [
        1 => 'Good',
        2 => 'Bad',
    ];

    protected $guarded = false;

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    static function getPipeDiameters()
    {
        return self::PIPE_DIAMETERS;
    }

    static function getPurposeTypes()
    {
        return self::PURPOSE_TYPES;
    }

    static function getLayingTypes()
    {
        return self::LAYING_TYPES;
    }

    static function getInsTypes()
    {
        return self::INS_TYPES;
    }

    static function getInsConditions()
    {
        return self::INS_CONDITIONS;
    }

    public function getHeatingPipelinePurposeTypeAttribute()
    {
        $purpose_types = self::PURPOSE_TYPES;
        foreach ($purpose_types as $key => $type) {
            if ($this->purpose_type == $key){
                return $type;
            }
        }
    }

    public function getHeatingPipelineLayingTypeAttribute()
    {
        $laying_types = self::LAYING_TYPES;
        foreach ($laying_types as $key => $type) {
            if ($this->laying_type == $key){
                return $type;
            }
        }
    }

    public function getHeatingPipelineInsTypeAttribute()
    {
        $ins_types = self::INS_TYPES;
        foreach ($ins_types as $key => $type) {
            if ($this->ins_type == $key){
                return $type;
            }
        }
    }

    public function getHeatingPipelineInsConditionAttribute()
    {
        $ins_conditions = self::INS_CONDITIONS;
        foreach ($ins_conditions as $key => $condition) {
            if ($this->ins_cond == $key){
                return $condition;
            }
        }
    }
}
