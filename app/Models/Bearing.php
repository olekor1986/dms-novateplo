<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bearing extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function pumps_where_bearing_in_front()
    {
        return $this->hasMany(Pump::class, 'front_bearing_id', 'id');
    }

    public function pumps_where_bearing_in_rear()
    {
        return $this->hasMany(Pump::class, 'rear_bearing_id', 'id');
    }
}
