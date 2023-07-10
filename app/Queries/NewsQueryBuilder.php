<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class NewsQueryBuilder extends QueryBuilder
{
  public function getModel(): Builder
  {
    return News::query();
  }

  /* ВЫВОД ВСЕХ НОВОСТЕЙ */
  public function getAll(): Collection
  {
    return $this->getModel()->with('categories')->get();
  }

  public function getActiveNews(): Collection
  {
    return $this->getModel()->active()->get();
  }
}
