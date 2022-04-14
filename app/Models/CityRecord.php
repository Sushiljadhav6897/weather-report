<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_id','weather_condition','temperature','feels_like','humidity','wind_speed',
    ];
    public function city(){
       return $this->belongsTo(City::class);
    }
}
