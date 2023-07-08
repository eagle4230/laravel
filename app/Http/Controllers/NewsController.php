<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Link;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\View;

final class NewsController extends Controller
{
  /* извлечь все новости */
  public function index(NewsQueryBuilder $newsQueryBuilder): View
  {
    return view('news.index', ['newsList' => News::all()]);
  }

  /* извлечь все новости со статусом "активные" */
  public function indexActive(NewsQueryBuilder $newsQueryBuilder): View
  {
    return view('news.index', ['newsList' => $newsQueryBuilder->getActiveNews()]);
  }

  /* извлечение новостей по категории */
  public function indexByCategory(int $category): View
  {
    //$news = Link::with('category_id', $category)->get();
    //dd($news);

    $modelLink = app(Link::class)->getNumNewsByCategory($category);
    $numNews = $modelLink->pluck('news_id')->unique()->all();   //array

    $newsByCategory = app(News::class)->whereIn('id', $numNews)->get();

    return view('news.indexByCategory', [
      'newsByCategory' => $newsByCategory,
      'urlCategory' => $category,
    ]);
  }

  /* извлечь новость по ID */
  public function show(string $category, int $id): View
  {
    $news = News::findOrFail($id);
    return view('news.show', ['news' => $news, 'urlCategory' => $category,]);
  }
}
