<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\City;
use App\Models\CityRecord;


class citiesrecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cities:records';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cities = City::get();
        foreach($cities as $city){
            $weather_records = $this->api($city->latitude, $city->longitude);
            $weather_records = json_decode($weather_records);
            $weather_records->main->temp - 273.15;
            $create_object_for_city_recordsd = array(
                "city_id" => $city->id,
                "weather_condition" =>  $weather_records->weather[0]->main,
                "temperature" => $weather_records->main->temp - 273.15,
                "feels_like"=> $weather_records->main->feels_like - 273.15,
                "humidity"=>$weather_records->main->humidity,
                "wind_speed"=>$weather_records->wind->speed                
            );
            CityRecord::create($create_object_for_city_recordsd);
           
        }
        exit;
    }

    public function api($lat,$long){
        //Get API ENDPOINT response 
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.openweathermap.org/data/2.5/weather?lat=".$lat."&lon=".$long."&appid=4c7f1f68689243332f5672f3f5d973e0",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_TIMEOUT => 30000,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        // Set Here Your Requesred Headers
        'Content-Type: application/json',
        ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        return $response;
    }
}
