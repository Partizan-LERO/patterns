<?php

abstract class AbstractFactory
{
    abstract public function createText($content);
    abstract public function createFormatter();
}


class JsonFactory extends AbstractFactory
{
    public function createText($content) {
        $json = new Json($content);
        return $json->json($content);
    }

    public function createFormatter()
    {
        return new JsonFormatter();
    }
}


class HtmlFactory extends AbstractFactory
{
    public function createText($content) {
        $html = new Html($content);
        return $html->wrapTag($content, 'h1');
    }

    public function createFormatter()
    {
        return new HtmlFormatter();
    }
}


abstract class Text
{
    public function __construct($content)
    {
        return $content;
    }
}


class Json extends Text
{
    public function __construct($content)
    {
        parent::__construct($content);
    }

    public function json($content)
    {
        return json_encode($content);
    }
}


class Html extends Text
{
    public function __construct($content)
    {
        parent::__construct($content);
    }

    public function wrapTag($content, $tag = 'p')
    {
        return "<$tag>$content</$tag>";
    }
}

interface Formatter
{
    public function format($text);
}

class JsonFormatter implements Formatter
{
    public function format($text)
    {
        return json_decode($text);
    }
}


class HtmlFormatter implements Formatter
{
    // actually, we should use Decorator for this method for better naming
    public function format($text)
    {
        return strip_tags($text);
    }
}


$json = new JsonFactory();
$text = $json->createText('УРА');
echo $text;
echo "<br>";
echo $json->createFormatter()->format($text);

echo "<br>";

$html = new HtmlFactory();
$text = $html->createText('УРА');
echo $text;
echo "<br>";
echo $html->createFormatter()->format($text);