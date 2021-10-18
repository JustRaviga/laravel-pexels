<?php

namespace DeDmytro\Pexels\Facades;

use DeDmytro\Pexels\Clients\PhotoApiClient;
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