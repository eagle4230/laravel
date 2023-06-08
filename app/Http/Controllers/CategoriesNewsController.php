<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesNewsController extends Controller
{
  // list all Categories
  public function list()
  {
    $categories = $this->getCategories();
    return view('categories.list', [
      'categoriesList' => $categories
    ]);
  }
}
