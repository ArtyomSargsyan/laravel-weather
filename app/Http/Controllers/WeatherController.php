<?php

namespace App\Http\Controllers;

use App\Repository\WeatherRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use RakibDevs\Weather\Weather;

class WeatherController extends Controller{

    /**
     * @var weatherRepository
     */
    protected WeatherRepository $weatherRepository;

    /**
     * @param WeatherRepository $weatherRepository
     */
    public function __construct(WeatherRepository $weatherRepository)
    {
        $this->weatherRepository = $weatherRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('weather');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getCity(Request $request){

        $this->weatherRepository->store($request->data);
        $wt = new Weather();
        return $wt->getCurrentByCity($request->data);


    }


}
