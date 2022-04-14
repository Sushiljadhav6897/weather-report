<?php 

namespace App\Http\Components;

use App\Models\User;
use App\Models\City;
use App\Models\CityRecord;
use Illuminate\Support\Facades\DB;

class CityComponent{
    public static function getData()       
    {
       $data = City::all();
       return $data;
    }
}


?>