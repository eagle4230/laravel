<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\Upload;
use Illuminate\Http\UploadedFile;

class UploadService implements Upload
{
  public function create(UploadedFile $uploadedFile): string
  {
    $path = $uploadedFile->storeAs('news_images', $uploadedFile->hashName(), 'public');
    if ($path === false) {
      throw new \Exception("File was not upload");
    }
    return $path;
  }
}
