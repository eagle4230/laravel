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

  /*public function getNews(string $category, int $id = null): array
  {
    $news = [];

    if ($id) {
      return [
        'id' => $id,
        'title' => fake()->jobTitle(),
        'author' => fake()->userName(),
        'status' => 'draft',
        'description' => fake()->text(100),
        'created_at' => now(),
      ];
    }

    for ($i = 1; $i < 6; $i++) {
      $news[$i] = [
        'id' => $i,
        'category' => $category,
        'title' => fake()->jobTitle(),
        'author' => fake()->userName(),
        'status' => 'draft',
        'description' => fake()->text(100),
        'created_at' => now('Europe/Moscow'),
      ];
    }
    return $news;
  }*/
}
