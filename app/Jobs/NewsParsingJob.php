<?php

declare(strict_types=1);

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\Contracts\Parser;

class NewsParsingJob implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  protected string $link;
  /**
   * Create a new job instance.
   */
  public function __construct(string $link)
  {
    $this->link = $link;
  }

  /**
   * Execute the job.
   */
  public function handle(Parser $parser): void
  {
    $parser->setLink($this->link)->saveParseData();
  }
}
