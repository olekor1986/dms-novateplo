<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pump extends Model
{
    use HasFactory;

    const IN_WORK = 1;
    const NOT_IN_WORK = 0;

    protected $guarded = false;

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function pump_type()
    {
        return $this->belongsTo(PumpType::class, 'pump_type_id', 'id');
    }

    public function front_bearing()
    {
        return $this->belongsTo(Bearing::class, 'front_bearing_id', 'id');
    }

    public function rear_bearing()
    {
        return $this->belongsTo(Bearing::class, 'rear_bearing_id', 'id');
    }

    public function mechanical_seal()
    {
        return $this->belongsTo(MechanicalSeal::class, 'mechanical_seal_id', 'id');
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updated_by_user()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }

    static function getPumpInWorkStatus()
    {
        return [
            self::IN_WORK => 'Yes',
            self::NOT_IN_WORK => 'No',
        ];
    }

    public function getPumpInWorkStatusAttribute()
    {
        if ($this->in_work === NULL) {
            return 'None';
        }
        return self::getPumpInWorkStatus()[$this->in_work];
    }
}
