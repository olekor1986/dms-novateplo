<?php

namespace App\Models\Source;

use App\Models\User;
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

    protected $guarded = false;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function source_fuel()
    {
        return $this->belongsTo(SourceFuel::class);
    }

    public function source_type()
    {
        return $this->belongsTo(SourceType::class);
    }

    public function city_district()
    {
        return $this->belongsTo(CityDistrict::class);
    }

    public function getLatAttribute()
    {
        if(!isset($this->gps)){
            return 0;
        }
        $gps = explode(',', $this->gps);
        return $gps[0];
    }

    public function getLonAttribute()
    {
        if(!isset($this->gps)){
            return 0;
        }
        $gps = explode(',', $this->gps);
        return $gps[1];
    }

    static function getInWorkStatus()
    {
        return [
            self::IN_WORK => 'Yes',
            self::NOT_IN_WORK => 'No',
        ];
    }

    public function getInWorkStatusAttribute()
    {
        if ($this->in_work === NULL) {
            return 'None';
        }
        return self::getInWorkStatus()[$this->in_work];
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

    static function getBalanceStatus()
    {
        return [
            self::ON_BALANCE => 'Yes',
            self::NOT_ON_BALANCE => 'No',
        ];
    }

    public function getBalanceStatusAttribute()
    {
        if ($this->balance === NULL) {
            return 'None';
        }
        return self::getBalanceStatus()[$this->balance];
    }

}
