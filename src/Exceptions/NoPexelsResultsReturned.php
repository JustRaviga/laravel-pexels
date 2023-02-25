<?php

namespace JustRaviga\Pexels\Exceptions;

use Exception;
use JustRaviga\Pexels\Photo;

class NoPexelsResultsReturned extends Exception
{
    public function __construct(?string $code = null)
    {
        parent::__construct(
            "No results returned. Pexels API code: $code"
        );
    }
}
