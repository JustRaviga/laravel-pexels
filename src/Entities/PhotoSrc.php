<?php

namespace JustRaviga\Pexels\Entities;

use Illuminate\Support\Arr;

class PhotoSrc
{
    public ?string $original;
    public ?string $large2x;
    public ?string $large;
    public ?string $medium;
    public ?string $small;
    public ?string $tiny;
    public ?string $portrait;
    public ?string $landscape;

    /**
     * PhotoSrc construct
     * @param string|null $original
     * @param string|null $large2x
     * @param string|null $large
     * @param string|null $medium
     * @param string|null $small
     * @param string|null $tiny
     * @param string|null $portrait
     * @param string|null $landscape
     */
    public function __construct(
        ?string $original,
        ?string $large2x,
        ?string $large,
        ?string $medium,
        ?string $small,
        ?string $tiny,
        ?string $portrait,
        ?string $landscape
    ) {
        $this->original = $original;
        $this->large2x = $large2x;
        $this->large = $large;
        $this->medium = $medium;
        $this->small = $small;
        $this->tiny = $tiny;
        $this->portrait = $portrait;
        $this->landscape = $landscape;
    }

    /**
     * Return PhotoSrc instance from array
     * @param $array
     * @return PhotoSrc
     */
    public static function fromArray($array){
        return new self(
            Arr::get($array,'original'),
            Arr::get($array,'large2x'),
            Arr::get($array,'large'),
            Arr::get($array,'medium'),
            Arr::get($array,'small'),
            Arr::get($array,'tiny'),
            Arr::get($array,'portrait'),
            Arr::get($array,'landscape'),
        );
    }
}
