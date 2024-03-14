<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    const IN_WORK = 1;
    const NOT_IN_WORK = 0;

    const MONITORING = 1;
    const WITHOUT_MONITORING = 0;

    const ON_BALANCE = 1;
    const NOT_ON_BALANCE = 0;

    const GPS = '34.517368,20.669463';

    protected $guarded = false;

    public function master()
    {
        return $this->belongsTo(User::class, 'master_id', 'id');
    }

    public function s_master()
    {
        return $this->belongsTo(User::class, 's_master_id', 'id');
    }

    public function source_type()
    {
        return $this->belongsTo(SourceType::class);
    }

    public function city_district()
    {
        return $this->belongsTo(CityDistrict::class);
    }

    public function boilers()
    {
        return $this->hasMany(Boiler::class);
    }

    public function pumps()
    {
        return $this->hasMany(Pump::class);
    }

    public function heating_pipelines()
    {
        return $this->hasMany(HeatingPipeline::class);
    }

    public function water_meters()
    {
        return $this->hasMany(WaterMeter::class);
    }

    public function getSourceGpsAttribute()
    {
        $pattern = '/^(|\-)(\d{1,2})\.(\d{1,9})\,(|\s){1}(|\-)(\d{1,2})\.(\d{1,9})$/';
        if (isset($this->gps) && preg_match($pattern, $this->gps)) {
            return $this->gps;
        } else {
            return self::GPS;
        }
    }

    public function getLatAttribute()
    {
        $gps_array = explode(',', $this->sourceGps);
        return $gps_array[0];
    }

    public function getLonAttribute()
    {
        $gps_array = explode(',', $this->sourceGps);
        return $gps_array[1];
    }

    static function getSourceInWorkStatus()
    {
        return [
            self::IN_WORK => 'Yes',
            self::NOT_IN_WORK => 'No',
        ];
    }

    public function getSourceInWorkStatusAttribute()
    {
        if ($this->in_work === NULL) {
            return 'None';
        }
        return self::getSourceInWorkStatus()[$this->in_work];
    }

    static function getMonitoringStatus()
    {
        return [
            self::MONITORING => 'Yes',
            self::WITHOUT_MONITORING => 'No',
        ];
    }

    public function getMonitoringStatusAttribute()
    {
        if ($this->monitoring === NULL) {
            return 'None';
        }
        return self::getMonitoringStatus()[$this->monitoring];
    }

    static function getSourceBalanceStatus()
    {
        return [
            self::ON_BALANCE => 'Yes',
            self::NOT_ON_BALANCE => 'No',
        ];
    }

    public function getSourceBalanceStatusAttribute()
    {
        if ($this->balance === NULL) {
            return 'None';
        }
        return self::getSourceBalanceStatus()[$this->balance];
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updated_by_user()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

}
