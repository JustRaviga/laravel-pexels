<?php

namespace Tests\Unit;

use JustRaviga\Pexels\Entities\PhotosSearchResponse;
use JustRaviga\Pexels\Facades\Pexels;
use Tests\TestCase;

class PhotoSearchTest extends TestCase
{
    public function testApiResponseIsCorrect()
    {
        $response = Pexels::photos()->search('cat');
        $this->assertInstanceOf(PhotosSearchResponse::class, $response);
    }
}
