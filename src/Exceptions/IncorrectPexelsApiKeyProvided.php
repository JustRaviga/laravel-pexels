<?php

namespace JustRaviga\Pexels\Exceptions;

use Exception;
use JustRaviga\Pexels\Photo;

class IncorrectPexelsApiKeyProvided extends Exception
{
    public function __construct()
    {
        parent::__construct(
            'Unauthorized. Please check your PEXELS_API_KEY is correct or get a new one. To get a key visit: https://www.pexels.com/api/new/'
        );
    }
}
