<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Link;
use Illuminate\Contracts\View\View;

final class NewsController extends Controller
{

  // public function index(int $category): View
  // {
  //   $modelNews = app(News::class);

  //   $news = $modelNews->getNews();

  //   return view('news.index', [
  //     'newsList' => $news,
  //     'urlCategory' => $category,
  //   ]);
  // }

  public function index(int $category): View
  {
    $modelLink = app(Link::class)->getNumNewsByCategory($category);
    $numNews = $modelLink->pluck('news_id')->unique()->all();   //array
    //$numNews = $modelLink->pluck('news_id')->unique();    //Collection
    //dd($numNews);

    $newsByCategory = app(News::class)->whereIn('id', $numNews)->get();

    //dd($newsByCategory);


    return view('news.indexByCategory', [
      'newsByCategory' => $newsByCategory,
      'urlCategory' => $category,
    ]);
  }




  public function show(string $category, int $id): View
  {
    $model = app(News::class);

    $news = $model->getNewsById($id);

    if (!$news) {
      return abort(404);
    }

    return view('news.show', [
      'news' => $news,
      'urlCategory' => $category,
    ]);
  }
}
