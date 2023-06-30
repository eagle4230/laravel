<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;

final class NewsController extends Controller
{

  public function index(int $category): View
  {
    $modelNews = app(News::class);
    $modelCategories = app(Category::class);

    $news = $modelNews->getNews();
    $categories = $modelCategories->getCategories();

    return view('news.index', [
      'newsList' => $news,
      'urlCategory' => $category,
      'titleCategory' => $categories,
    ]);
  }

  public function show(string $category, int $id): View
  {
    $model = app(News::class);

    return view('news.show', [
      'news' => $model->getNewsById($id),
      'urlCategory' => $category,
    ]);
  }
}
