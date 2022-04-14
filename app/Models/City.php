<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    // protected $table = 'cities';
    // public $primary_key ='id';
    protected $fillable = [
        'name',
        'longitude',
        'latitude',
    ];
    public function cityrecord(){ 
        return $this->hasMany(CityRecord::class);
    }

}
