<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\Store;
use App\Http\Requests\News\Update;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\News;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
  protected QueryBuilder $categoriesQueryBuilder;
  protected QueryBuilder $newsQueryBuilder;

  public function __construct(
    CategoriesQueryBuilder $categoriesQueryBuilder,
    NewsQueryBuilder $newsQueryBuilder
  ) {
    $this->categoriesQueryBuilder = $categoriesQueryBuilder;
    $this->newsQueryBuilder = $newsQueryBuilder;
  }


  /* ВЫВОД ВСЕХ НОВОСТЕЙ */
  public function index(): View
  {
    return view('admin.news.index', [
      'newsList' => $this->newsQueryBuilder->getAll()
    ]);
  }

  /* СОЗДАНИЕ НОВОСТИ */
  public function create(): View
  {
    return view('admin.news.create', [
      'categories' => $this->categoriesQueryBuilder->getAll(),
    ]);
  }

  /* СОХРАНЕНИЕ НОВОСТИ */
  public function store(Store $request): RedirectResponse
  {
    $news = News::create($request->validated());

    if ($news) {
      $news->categories()->attach($request->getCategories()); // СОХРАНЯЕМ
      // ПРИ УСПЕШНОМ СОХРАНЕНИИ ВЫВОДИМ СООБЩЕНИЕ
      return redirect()->route('admin.news.index')->with('success', 'News has been create');
    }
    // ЕСЛИ НЕ СОХРАНИЛАСЬ, ВЫВОДИМ СООБЩЕНИЕ
    return back()->with('error', 'News has not been create');
  }

  /**
   * Display the specified resource.
   */
  public function show(News $news)
  {
    return 0;
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(News $news): View
  {
    return view('admin.news.edit', [
      'news' => $news,
      'categories' => $this->categoriesQueryBuilder->getAll(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Update $request, News $news): RedirectResponse
  {
    $news = $news->fill($request->validated());

    if ($news->save()) {
      $news->categories()->sync($request->getCategories());
      return redirect()->route('admin.news.index')->with('success', 'News has been update');
    }

    return back()->with('error', 'News has not been update');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(News $news)
  {
    //
  }
}
