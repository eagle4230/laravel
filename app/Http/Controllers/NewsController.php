<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

final class NewsController extends Controller
{

  public function index(string $category): View
  {
    $model = app(News::class);

    $nameCategory = $this->getCategories();

    $news = $model->getNews();

    return view('news.index', [
      'newsList' => $news,
      'titleCategory' => $nameCategory[$category],
      'urlCategory' => $category,
    ]);
  }

  public function show(string $category, int $id): View
  {
    $nameCategory = $this->getCategories();

    $model = app(News::class);
    //dd($model->getNewsById($id));
    return view('news.show', [
      'news' => $model->getNewsById($id),
      'titleCategory' => $nameCategory[$category],
      'urlCategory' => $category,
    ]);
  }
}
