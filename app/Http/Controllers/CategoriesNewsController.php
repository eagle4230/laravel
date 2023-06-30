<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoriesNewsController extends Controller
{
  // list all Categories
  public function list(): View
  {
    $model = app(Category::class);

    $categories = $model->getCategories();

    return view('categories.list', [
      'categoriesList' => $categories
    ]);
  }
}
