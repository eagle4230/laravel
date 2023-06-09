<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Link extends Model
{
  use HasFactory;

  protected $table = 'links';

  protected $fillable = [
    'category_id',
    'news_id',
    'source_id',
  ];

  public function getNumNewsByCategory(int $category): Collection
  {
    return DB::table($this->table)->where('category_id', $category)->get();
  }
}
