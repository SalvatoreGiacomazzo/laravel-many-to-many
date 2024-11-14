<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wanted extends Model
{
    use HasFactory;
    protected $table = 'wanted';




    protected $fillable = [
        'name',
        'last_name',
        'date_of_birth',
        'nationality',
        'felony',
        'device_id',
        'device_type',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function felonies()
    {
        return $this->belongsToMany(Felony::class, 'wanted_felony', 'wanted_id', 'felony_id')->withTimestamps();
    }
}
