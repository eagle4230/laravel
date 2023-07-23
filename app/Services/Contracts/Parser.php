<?php

declare(strict_types=1);

namespace App\Services\Contracts;

interface parser
{
  public function setLink(string $link): self;
  public function saveParseData(): void;
}
