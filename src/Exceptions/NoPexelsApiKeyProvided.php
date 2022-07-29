<?php

namespace JustRaviga\Pexels\Exceptions;

use JustRaviga\Pexels\Photo;
use Throwable;

class NoPexelsApiKeyProvided extends \Exception
{
    public function __construct()
    {
        parent::__construct(
            'No API key provided. Please add PEXELS_API_KEY to your .env. To get key visit: https://www.pexels.com/ru-ru/api/new/'
        );
    }
}
