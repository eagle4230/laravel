<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as Parser;

class ParserController extends Controller
{
  /**
   * Handle the incoming request.
   */
  public function __invoke(Request $request): string
  {
    $url = "https://news.rambler.ru/rss/tech/";
    $xml = Parser::load($url);
    $data = $xml->parse([
      'title' => [
        'uses' => 'channel.title',
      ],
      'link' => [
        'uses' => 'channel.link',
      ],
      'description' => [
        'uses' => 'channel.description',
      ],
      'image' => [
        'uses' => 'channel.image.url',
      ],
      'news' => [
        'uses' => 'channel.item[title,link,author,description,pubDate]',
      ],
    ]);

    dd($data);
  }
}
