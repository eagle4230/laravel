<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Link;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\View;

final class NewsController extends Controller
{

  public function index(NewsQueryBuilder $newsQueryBuilder): View
  {
    return view('news.index', ['newsList' => News::all()]);
  }

  public function indexByCategory(int $category): View
  {
    $modelLink = app(Link::class)->getNumNewsByCategory($category);
    $numNews = $modelLink->pluck('news_id')->unique()->all();   //array

    $newsByCategory = app(News::class)->whereIn('id', $numNews)->get();

    return view('news.indexByCategory', [
      'newsByCategory' => $newsByCategory,
      'urlCategory' => $category,
    ]);
  }

  public function show(string $category, int $id): View
  {
    $news = News::findOrFail($id);

    return view('news.show', [
      'news' => $news,
      'urlCategory' => $category,
    ]);
  }
}
