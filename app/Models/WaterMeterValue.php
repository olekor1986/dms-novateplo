<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterMeterValue extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function water_meter()
    {
        return $this->belongsTo(WaterMeter::class);
    }

    public function getAllMonths()
    {
        return $this->service->getAllMonthsFromValuesTable();
    }
}
