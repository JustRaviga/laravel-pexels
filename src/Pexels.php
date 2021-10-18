<?php

namespace JustRaviga\Pexels;

use JustRaviga\Pexels\Clients\PhotoApiClient;

class Pexels
{
    /**
     * Return Pexels photo api client
     * @return PhotoApiClient
     */
    public function photos()
    {
        return new PhotoApiClient();
    }
}
