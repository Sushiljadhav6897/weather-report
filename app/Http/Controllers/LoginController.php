<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use App\Models\CityRecord;
use App\Http\Components\CityrecordsComponent;
use App\Http\Components\CityComponent;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{  
    public function __construct()
    {
        // 
    }
    public function user(){
        return view('login');  
    }
    public function store(Request $request){
        $request->validate([
        'email' =>'required | email |exists:users',    
        'password' =>'required | min:10',
        ]);
        $email = $request->email;
        $password = $request->password;
        $userpassword =User::where('email', $email)->get()->pluck('password');
        try {
            $decrypted = Crypt::decryptString($userpassword);
        } catch (DecryptException $e) {
            //
        }
        //dd($decrypted, $password);
        if($decrypted != $password){
            return redirect()->route('login')->with('user_login','login failed');
        }else{
            $user = User::where('email',$email)->get()->pluck('id')[0];
            $admin = config("constants.Admin");
            //dd($admin);
            if(in_array($user,$admin)){
             Session::put('Admin',$user); 
             
            }
            return redirect()->route('dashboard');
        }        
    }

    public function dashboard(Request $request){
        Session::forget('name');
        Session::forget('weather');
        $name = $request->name;
        $data['records'] =CityrecordsComponent::getdata();
        //dd($data);
        $data['name']= CityComponent::getData();
        $data['Weather']=CityrecordsComponent::getweather();
        //dd($data);
        
            return view('dashboard',$data);
       
    }

    public function update($id){
        $record = $id;
        $data['records'] = CityrecordsComponent::getdata(null, $record);
        $data['pagetitle'] = 'Weather Report';
        if(Session::has('Admin')){
            return view('Weather.edit',$data);
        }
    }
    public function edit(Request $request){
        
        $request->validate([
        "Weather_condition" =>"required | Alpha",
        "temperature" =>"required | Numeric",
        "Feels_like" => "required | Numeric",
        "Humidity" =>"required | Numeric",
        "wind_speed" =>"required | Numeric",
        "created" => "required | date",
        ],[
            "Weather_condition.required"=>"Weather Condition is required",
        ]);
        $where=[
            'id' => $request->id,
        ];
        $data= [
         'weather_condition' => $request->Weather_condition, 
         'temperature'=>$request->temperature,  
         'feels_like'=>$request->Feels_like,
         'humidity'=>$request->Humidity,
         'wind_speed'=> $request->wind_speed,
         'created_at'=>$request->created,
        ];
        $result = CityrecordsComponent::update($where, $data);
        if($result){
            return redirect()->route('dashboard')->with('user_login',"Data Upadted successfully");
        }
    }

    public function delete($id){
        $id = $id;
        $result = CityRecord::where('id',$id)->delete();
        if($result){
            return redirect()->route('dashboard')->with('user_login','Data Deleted Successfully');
        }   
    }
    public function logout(){
        Session::flush('Admin');
        return redirect()->route('login')->with('user_login','logout Susccessfully');
    }

    public function search(Request $request){
        //dd($request->all());
        $name = $request->city;
       
        Session::put('name',$name);
        
        $weather = $request->weather;
        Session::put('weather',$weather);
        
        $data['records'] = CityrecordsComponent::getdata($name,null,$weather);
        $data['name']= CityComponent::getData();
       // dd($data);
        $data['Weather']=CityrecordsComponent::getweather();
      
        return view('dashboard',$data);
    }
}
