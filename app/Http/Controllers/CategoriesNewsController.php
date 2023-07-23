<?php

namespace App\Http\Controllers;

use App\Queries\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;

class CategoriesNewsController extends Controller
{
  // list all Categories
  public function list(CategoriesQueryBuilder $categoriesQueryBuilder): View
  {
    return view('categories.list', ['categoriesList' => $categoriesQueryBuilder->getAll()]);
  }
}
