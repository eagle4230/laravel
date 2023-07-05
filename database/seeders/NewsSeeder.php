<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\NewsStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('news')->insert($this->getData());
  }

  public function getData(): array
  {
    $response = [];
    for ($i = 1; $i < 11; $i++) {
      $response[] = [
        'title' => 'News# ' . $i,
        'author' => fake()->userName(),
        'image' => fake()->imageUrl(),
        'status' => NewsStatus::ACTIVE->value,
        'description' => fake()->realText(rand(100, 1000)),
        'created_at' => now(),
        'updated_at' => now(),
      ];
    }

    return $response;
  }
}
