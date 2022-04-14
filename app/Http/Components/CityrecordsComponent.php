<?php 

namespace App\Http\Components;

use App\Models\User;
use App\Models\City;
use App\Models\CityRecord;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\models;


class CityrecordsComponent
{
    public static function getdata($name = "", $id = "",$weather ="")
    {
         $data = CityRecord::with("city");
        // echo "<pre>";
        // print_r($data->toArray());exit;
         if($id){
             $data->where("id",$id);
        }
        if($name) {
            $data ->where('city_id',$name);
         }
         if($weather) {
             $data -> where('weather_condition',$weather);
         }
        
          return $data->get();
    
    }
    public static function getweather(){
        $data = CityRecord::query()->groupBy('weather_condition')->get('weather_condition');
        return $data;
    }
    public static function update($where, $data) {
        $data = CityRecord::where($where)->update($data);
        return $data;
    }
}
?>