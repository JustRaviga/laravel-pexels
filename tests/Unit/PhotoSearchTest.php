<?php

namespace Tests\Unit;

use DeDmytro\Pexels\Entities\PhotosSearchResponse;
use DeDmytro\Pexels\Facades\Pexels;
use Tests\TestCase;

class PhotoSearchTest extends TestCase
{
    public function testApiResponseIsCorrect()
    {
        $response = Pexels::photos()->search('cat');
        $this->assertInstanceOf(PhotosSearchResponse::class, $response);
    }
}
