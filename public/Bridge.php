<?php
interface Theme
{
    public function getColor();
}

class DarkTheme implements Theme
{
    public function getColor()
    {
        return 'Dark';
    }
}

class RedTheme implements Theme
{
    public function getColor()
    {
        return 'Red';
    }
}

class LightTheme implements Theme
{
    public function getColor()
    {
        return 'White';
    }
}

interface Page
{
    public function render();
}

class MainPage implements Page
{
    public $theme;
    public $title = 'Main page';

    public function __construct(Theme $theme)
    {
        return $this->theme = $theme;
    }

    public function render()
    {
        return $this->title . ' ' . $this->theme->getColor();
    }
}

class ContactsPage implements Page
{
    public $theme;
    public $title = 'Contacts page';

    public function __construct(Theme $theme)
    {
        return $this->theme = $theme;
    }

    public function render()
    {
        return $this->title . ' ' . $this->theme->getColor();
    }
}


$mainPage = new MainPage(new DarkTheme());
echo $mainPage->render() . ' ';

$contactsPage = new ContactsPage(new LightTheme());
echo $contactsPage->render() . ' ';