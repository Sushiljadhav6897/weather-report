<?php 

namespace App\Http\Components;

use App\Models\User;
use App\Models\City;
use App\Models\CityRecord;
use Illuminate\Support\Facades\DB;

class UserComponent{
    
    public static function create($data){
        // dd($data);
        $data = User::query()->create($data);
        return $data;
    }
    public static function update($where, $data){
        // dd($data);
        $data = User::query()->where($where)->update($data);
        return $data;
    }
}


?>