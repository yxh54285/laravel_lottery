<?php

namespace App\Exceptions;

use Illuminate\Support\Facades\Log;
use Psr\Log\LogLevel;
use RuntimeException;

class MaxPeopleException extends RuntimeException
{
  protected $error = 'The number of people exceeded the limit error';
  protected $logLevel = LogLevel::ERROR;
  protected $httpCode = 400;

  public function report(): void
  {
    Log::log($this->logLevel, $this->error, array_merge([
      'error_description' => $this->getMessage(),
    ]));
  }

  public function render()
  {
    return response()->json(['success' => 0], $this->httpCode);
  }
}
