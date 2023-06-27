<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('links', static function (Blueprint $table): void {
      $table->foreignId('category_id')
        ->references('id')
        ->on('categories')
        ->cascadeOnDelete();

      $table->foreignId('news_id')
        ->references('id')
        ->on('news')
        ->cascadeOnDelete();

      $table->foreignId('source_id')
        ->references('id')
        ->on('sources')
        ->cascadeOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('links');
  }
};
