<?php

namespace DeDmytro\Pexels\Entities;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;

class PhotosSearchResponse implements Arrayable
{
    public int $totalResults;
    public int $page;
    public int $perPage;
    /**
     * @var array|Photo[]
     */
    public array $photos;
    public string $nextPage;

    /**
     * Response constructor
     * @param int $totalResults
     * @param int $page
     * @param int $perPage
     * @param array $photos
     * @param string $nextPage
     */
    public function __construct(int $totalResults, int $page, int $perPage, array $photos, string $nextPage)
    {
        $this->totalResults = $totalResults;
        $this->page = $page;
        $this->perPage = $perPage;
        $this->photos = array_map(function ($photo){
            return Photo::fromArray($photo);
        }, $photos);
        $this->nextPage = $nextPage;
    }

    /**
     * Return new instance
     * @param $array
     * @return PhotosSearchResponse
     */
    public static function fromArray($array)
    {
        return new self(
            Arr::get($array,'total_results'),
            Arr::get($array,'page'),
            Arr::get($array,'per_page'),
            Arr::get($array,'photos'),
            Arr::get($array,'next_page'),
        );
    }

    /**
     * @inheritDoc
     */
    public function toArray()
    {
        return [
            'total_results' => $this->totalResults,
            'page' => $this->page,
            'per_page' => $this->perPage,
            'photos' => $this->photos,
            'next_page' => $this->nextPage,
        ];
    }
}