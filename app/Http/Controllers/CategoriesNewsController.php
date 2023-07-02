<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoriesNewsController extends Controller
{
  // list all Categories
  public function list(): View
  {
    return view('categories.list', ['categoriesList' => Category::all()]);
  }
}
