<?php
class MusicApi
{
    public $token;
    public $apiKey;

    public function __construct($apiKey)
    {
        return $this->apiKey;
    }

    public function getToken()
    {
        return $this->token = 'Token + ' . $this->apiKey;
    }

    public function login($token)
    {
        return 'Login ' . $token;
    }

    public function logout()
    {
        return 'Logout';
    }

    public function getArtist()
    {
        return 'Artist';
    }

    public function getSongTitle()
    {
        return 'Song Title';
    }

    public function downloadFile()
    {
        return 'Big size';
    }
}

class Compressor
{
    public function resize($file)
    {
        echo 'Good size ' . "\n" . $file . "\n";
        return $this;
    }


    public function addFilter($filter)
    {
        echo 'Added ' . $filter . "\n";
        return $this;
    }


    public function save($title)
    {
        echo 'Saved as ' . $title . "\n";
        return true;
    }
}

class DownloaderFacade
{
    public $api;
    public $compressor;

    public function __construct($apiKey)
    {
        $this->api = new MusicApi($apiKey);
        $this->compressor = new Compressor();
    }

    public function download()
    {
        $this->api->login($this->api->getToken());
        $title = $this->api->getSongTitle();
        $artist = $this->api->getArtist();
        $file = $this->api->downloadFile();

        $this->compressor->resize($file)->addFilter('highBass')->save($title . ' ' . $artist);
    }
}

$downloader = new DownloaderFacade('API-KEY 12425dkfgldkt34523');
$downloader->download();