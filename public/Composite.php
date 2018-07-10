<?php
    ini_set('display_errors', 1);
interface Webmaster
{
    public function login();
    public function logout();
    public function addSite($site);
    public function removeSite($site);
    public function getStatus($site);
    public function getList();
}

class GoogleWebmaster implements Webmaster
{

    public function login()
    {
        echo 'Google login';
    }

    public function logout()
    {
        echo 'Google logout';
    }

    public function addSite($site)
    {
        echo 'Google: site ' . $site . ' was added';
    }

    public function removeSite($site)
    {
        echo 'Google: site ' . $site . ' was removed';
    }

    public function getStatus($site)
    {
        echo 'Google: site ' . $site . ' status: Verified';
    }

    public function getList()
    {
        $array = [];

        for ($i = 0; $i < 15; $i++) {
            $array[] = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10);
        }

        echo "Google: sites:  \n" .implode(",\n", $array);
    }
}

class YandexWebmaster implements Webmaster
{

    public function login()
    {
        echo 'Yandex login';
    }

    public function logout()
    {
        echo 'Yandex logout';
    }

    public function addSite($site)
    {
        echo 'Yandex: site ' . $site . ' was added';
    }

    public function removeSite($site)
    {
        echo 'Yandex: site ' . $site . ' was removed';
    }

    public function getStatus($site)
    {
        echo 'Yandex: site ' . $site . ' status: Verified';
    }

    public function getList()
    {
        $array = [];

        for ($i = 0; $i < 15; $i++) {
            $array[] = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10);
        }

        echo "Yandex: sites:  \n" .implode(",\n", $array);
    }
}

class Webmasters
{
    public $webmasters;

    public function addWebmaster(Webmaster $webmaster)
    {
        $this->webmasters[] = $webmaster;
    }

    public function login()
    {
        foreach ($this->webmasters as $webmaster) {
            $webmaster->login();
        }
    }

    public function logout()
    {
        foreach ($this->webmasters as $webmaster) {
            $webmaster->logout();
        }
    }

    public function add($site)
    {
        foreach ($this->webmasters as $webmaster) {
            $webmaster->addSite($site);
        }
    }

    public function remove($site)
    {
        foreach ($this->webmasters as $webmaster) {
            $webmaster->removeSite($site);
        }
    }

    public function getStatus($site)
    {
        foreach ($this->webmasters as $webmaster) {
            $webmaster->getStatus($site);
        }
    }

    public function getList()
    {
        foreach ($this->webmasters as $webmaster) {
            $webmaster->getList();
        }
    }
}


$webmaster = new Webmasters();
$webmaster->addWebmaster(new YandexWebmaster());
$webmaster->addWebmaster(new GoogleWebmaster());
$webmaster->login();
echo "<br>";
$webmaster->add('http://sss57.ru');
    echo "<br>";
$webmaster->getStatus('http://sss57.ru');
    echo "<br>";
$webmaster->remove('http://sss57.ru');
    echo "<br>";
$webmaster->getList();
    echo "<br>";
$webmaster->logout();
