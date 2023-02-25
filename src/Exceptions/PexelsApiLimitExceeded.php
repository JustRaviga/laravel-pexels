<?php

namespace JustRaviga\Pexels\Exceptions;

use Exception;
use JustRaviga\Pexels\Photo;

class PexelsApiLimitExceeded extends Exception
{
    public function __construct()
    {
        parent::__construct(
            'Pexels API limit exceeded. Please wait 1 hour before making another request. https://help.pexels.com/hc/en-us/articles/900006470063-What-steps-can-I-take-to-avoid-hitting-the-rate-limit-'
        );
    }
}
