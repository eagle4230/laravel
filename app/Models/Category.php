<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
  use HasFactory;

  protected $table = 'categories';

  /* Relations - many to many*/
  public function news(): BelongsToMany
  {
    return $this->belongsToMany(News::class, 'links', 'category_id', 'news_id');
  }
}
