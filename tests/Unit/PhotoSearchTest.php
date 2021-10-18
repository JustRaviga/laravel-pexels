<?php

namespace Tests\Unit;

use DeDmytro\Pexels\Entities\PhotosSearchResponse;
use DeDmytro\Pexels\PhotoApiClient;
use Tests\TestCase;

class PhotoSearchTest extends TestCase
{
    public function testApiResponseIsCorrect()
    {
        $client = new PhotoApiClient();

        $response = $client->search('cat');
        $this->assertInstanceOf(PhotosSearchResponse::class,$response);
    }
}
