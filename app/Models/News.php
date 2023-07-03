<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
  use HasFactory;

  protected $table = 'news';

  protected $fillable = [
    'title',
    'author',
    'status',
    'description',
  ];

  /* Relations */
  public function categories(): BelongsToMany
  {
    return $this->belongsToMany(Category::class, 'links', 'news_id', 'category_id');
  }


  // public function getNews(): Collection
  // {
  //   return DB::table($this->table)->get();
  // }

  // public function getNewsById(int $id): mixed
  // {
  //   return DB::table($this->table)->find($id);
  // }
}
