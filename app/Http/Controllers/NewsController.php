<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class NewsController extends Controller
{

  public function index(string $category): View
  {
    $nameCategory = $this->getCategories();
    $news = $this->getNews($category);
    return view('news.index', [
      'newsList' => $news,
      'titleCategory' => $nameCategory[$category]
    ]);
  }

  public function show(string $category, int $id): View
  {
    $nameCategory = $this->getCategories();
    $news = $this->getNews($category, $id);
    return view('news.show', [
      'news' => $news,
      'titleCategory' => $nameCategory[$category]
    ]);
  }
}
