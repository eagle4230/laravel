<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('links')->insert($this->getData());
  }

  public function getData(): array
  {
    $response = [];
    for ($i = 1; $i < 11; $i++) {
      $response[] = [
        'source_id' => fake()->numberBetween(1, 10),
        'category_id' => fake()->numberBetween(1, 5),
        'news_id' => fake()->numberBetween(1, 10),
      ];
    }

    return $response;
  }
}
