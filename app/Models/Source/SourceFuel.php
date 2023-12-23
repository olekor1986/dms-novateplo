<?php

namespace App\Models\Source;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SourceFuel extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function sources()
    {
        return $this->hasMany(Source::class);
    }
}
