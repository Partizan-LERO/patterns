<?php

interface GeoApiInterface {
    public function getLatitude();
    public function getLongitude();
}

class YandexGeoApi implements GeoApiInterface
{
    public $longitude = 100;
    public $latitude = 200;

    public function getLatitude() :int
    {
        return $this->latitude;
    }

    public function getLongitude() :int
    {
        return $this->longitude;
    }
}

class GoogleGeoApi
{
    public $geoApi;
    public $cords = [300, 500];

    public function getCords() :array
    {
        return $this->cords;
    }
}

class GoogleGeoApiAdapter implements GeoApiInterface
{
    public $api;

    public function __construct(GoogleGeoApi $api)
    {
        return $this->api = $api;
    }

    public function getLatitude() :int
    {
        return $this->api->getCords()[0];
    }

    public function getLongitude() :int
    {
        return $this->api->getCords()[1];
    }
}


$googleApi = new GoogleGeoApiAdapter(new GoogleGeoApi());
echo $googleApi->getLatitude() . ' ';
echo $googleApi->getLongitude() . ' ';

$yandexApi = new YandexGeoApi();
echo $yandexApi->getLatitude() . ' ';
echo $yandexApi->getLongitude() . ' ';
