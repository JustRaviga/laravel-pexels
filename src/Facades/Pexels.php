<?php

namespace JustRaviga\Pexels\Facades;

use JustRaviga\Pexels\Clients\PhotoApiClient;
use Illuminate\Support\Facades\Facade;

/**
 * @method PhotoApiClient photos()
 */
class Pexels extends Facade
{
    /**
     * Return facade unique key
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pexels';
    }
}
