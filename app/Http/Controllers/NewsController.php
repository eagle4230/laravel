<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
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
    $selectCategory = Category::find($category);
    return view('news.indexByCategory', ['category' => $selectCategory, 'news' => $selectCategory->news]);
  }

  /* извлечь новость по ID */
  public function show(string $category, int $id): View
  {
    $news = News::findOrFail($id);
    return view('news.show', ['news' => $news, 'urlCategory' => $category]);
  }
}
