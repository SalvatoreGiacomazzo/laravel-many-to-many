<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Felony extends Model
{
    use HasFactory;

    protected $table = 'felonies';
    public function wanted()
    {
        return $this->belongsToMany(Wanted::class, 'wanted_felony', 'wanted_id', 'felony_id');
    }
}
