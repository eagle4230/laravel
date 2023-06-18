<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
  use AuthorizesRequests, ValidatesRequests;

  public function getCategories()
  {
    $categories = [
      'politics' => 'Политика',
      'cars' => 'Автомобили',
      'gadgets' => 'Гаджеты',
      'programs' => 'Программы',
      'films' => 'Фильмы'
    ];

    return $categories;
  }
}
