<?php

namespace Tests\Feature\Http\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryNewsControllerTest extends TestCase
{
  /**
   * A basic feature test example.
   */
  public function testSuccessCategoriesList(): void
  {
    $response = $this->get(route('admin.categories.index'));

    $response->assertStatus(200);
  }

  public function testSuccessCreateForm(): void
  {
    $response = $this->get(route('admin.categories.create'));

    $response->assertStatus(200);
  }

  public function testSuccessStoreResponse(): void
  {
    $postData = [
      'category' => fake()->text(12)
    ];

    $response = $this->post(route('admin.categories.store'), $postData);

    $response->assertStatus(200);
  }
}
