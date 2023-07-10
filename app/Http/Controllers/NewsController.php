<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\View;

final class NewsController extends Controller
{
  /* ИЗВЛЕЧЬ ВСЕ НОВОСТИ */
  public function index(NewsQueryBuilder $newsQueryBuilder): View
  {
    return view('news.index', ['newsList' => News::all()]);
  }

  /* ИЗВЛЕЧЬ ВСЕ НОВОСТИ СО СТАТУСОМ "АКТИВНЫЕ" */
  public function indexActive(NewsQueryBuilder $newsQueryBuilder): View
  {
    return view('news.index', ['newsList' => $newsQueryBuilder->getActiveNews()]);
  }

  /* ИЗВЛЕЧЕНИЕ НОВОСТЕЙ ПО КАТЕГОРИИ */
  public function indexByCategory(int $category): View
  {
    $selectCategory = Category::findOrFail($category);
    return view('news.indexByCategory', ['category' => $selectCategory, 'news' => $selectCategory->news]);
  }

  /* ИЗВЛЕЧЬ НОВОСТЬ ПО ID */
  public function show(string $category, int $id): View
  {
    $news = News::findOrFail($id);
    return view('news.show', ['news' => $news, 'urlCategory' => $category]);
  }
}
