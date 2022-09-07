<?php
namespace App\Repository;

use App\Models\Weather;


class WeatherRepository {

    /**
     * @param string $data
     * @return mixed
     */
    public function store(string $data)
    {
       return weather::create([
          'city' => $data
       ]);
    }
}
