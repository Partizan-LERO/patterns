<?php
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

class StaticFactory
{
    public static function factory($type)
    {
        if ($type === 'json') {
            return new JsonFormatter();
        }

        if ($type === 'html') {
            return new HtmlFormatter();
        }

        throw new \InvalidArgumentException('Unknown format given');
    }
}


$json = StaticFactory::factory('json');
$html = StaticFactory::factory('html');
//$unknown = StaticFactory::factory('unknown');

echo $html->format('<h1>HTML</h1>');
echo $json->format(json_encode('JSON'));
//echo $unknown->format('sdfsf');