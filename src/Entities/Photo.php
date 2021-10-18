<?php

namespace JustRaviga\Pexels\Entities;

use Closure;
use Illuminate\Database\Query\Expression;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Photo
{
    public int $id;
    public int  $width;
    public int $height;
    public string $url;
    public ?string $photographer;
    public ?string $photographerUrl;
    public ?int $photographerId;
    public string $avgColor;
    public PhotoSrc $src;
    public ?bool $liked;

    /**
     * Photo constructor
     * @param int $id
     * @param int $width
     * @param int $height
     * @param string $url
     * @param string|null $photographer
     * @param string|null $photographerUrl
     * @param int|null $photographerId
     * @param string $avgColor
     * @param array $src
     * @param ?bool $liked
     */
    public function __construct(
        int $id,
        int $width,
        int $height,
        string $url,
        ?string $photographer,
        ?string $photographerUrl,
        ?int $photographerId,
        string $avgColor,
        array $src,
        ?bool $liked
    ) {
        $this->id = $id;
        $this->width = $width;
        $this->height = $height;
        $this->url = $url;
        $this->photographer = $photographer;
        $this->photographerUrl = $photographerUrl;
        $this->photographerId = $photographerId;
        $this->avgColor = $avgColor;
        $this->src = PhotoSrc::fromArray($src);
        $this->liked = (bool)$liked;
    }

    /**
     * Return Photo instance from array
     * @param $array
     * @return Photo
     */
    public static function fromArray($array){
        return new self(
            Arr::get($array,'id'),
            Arr::get($array,'width'),
            Arr::get($array,'height'),
            Arr::get($array,'url'),
            Arr::get($array,'photographer'),
            Arr::get($array,'photographer_url'),
            Arr::get($array,'photographer_id'),
            Arr::get($array,'avg_color'),
            Arr::get($array,'src'),
            Arr::get($array,'liked'),
        );
    }
}
