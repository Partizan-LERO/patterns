<?php
interface ThemeInterface
{
    public function getColor();
}

class DarkTheme implements ThemeInTerface
{
    public function getColor()
    {
        return 'Dark';
    }
}

class RedTheme implements ThemeInTerface
{
    public function getColor()
    {
        return 'Red';
    }
}

class LightTheme implements ThemeInterface
{
    public function getColor()
    {
        return 'White';
    }
}

interface PageInterface
{
    public function render();
}

class MainPage implements PageInterface
{
    public $theme;
    public $title = 'Main page';

    public function __construct(ThemeInterface $theme)
    {
        return $this->theme = $theme;
    }

    public function render()
    {
        return $this->title . ' ' . $this->theme->getColor();
    }
}

class ContactsPage implements PageInterface
{
    public $theme;
    public $title = 'Contacts page';

    public function __construct(ThemeInterface $theme)
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