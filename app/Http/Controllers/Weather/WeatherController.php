<?php

namespace App\Http\Controllers\Weather;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeatherController extends Controller
{
    /* protected $weather;
    public function __construct(OpenWeather $weather)
    {
        $this->weather = $weather;
    } */
    public function index()
    {

         $location = request()->location ? request()-> location : 'Nairobi, Kenya';
         $apiKey = config('services.openweather.key');
         $currenturl ="https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}&units=metric";
         $futureurl  = "https://api.openweathermap.org/data/2.5/daily?q={$location}&cnt=5&appid={$apiKey}&units=metric";
         $ch = curl_init();

         curl_setopt($ch, CURLOPT_HEADER, 0);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_URL, $currenturl);
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
         curl_setopt($ch, CURLOPT_VERBOSE, 0);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         $response = curl_exec($ch);

         curl_close($ch);
         $data = json_decode($response, true);
         $currentTime = time();
         /* dd($data); */


       return view('admin.weather.index', compact('data','location'));
    }
    public function show()
    {
        $location = 'Nairobi';
         $apiKey = '';
         $futureurl  = "https://api.openweathermap.org/data/2.5/forecast/daily?q={$location}&cnt=5&appid={$apiKey}&units=metric";
         $ch = curl_init();

         curl_setopt($ch, CURLOPT_HEADER, 0);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_URL, $futureurl);
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
         curl_setopt($ch, CURLOPT_VERBOSE, 0);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         $response = curl_exec($ch);

         curl_close($ch);
         $data = json_decode($response, true);
         $currentTime = time();
         dd($data);
        return view('admin.weather.show', compact('data'));
    }

}
