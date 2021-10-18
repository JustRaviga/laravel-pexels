<?php

namespace DeDmytro\Pexels;

use Illuminate\Contracts\Support\Arrayable;

class SearchOptions implements Arrayable
{
    protected $perPage;
    protected $page;
    protected $size;
    protected $color;
    protected $locale;
    protected $orientation;

    /**
     * Make new object
     * @return SearchOptions
     */
    public static function make(){
        return new self();
    }

    /**
     * Set page size
     * @param int $perPage
     */
    public function perPage(int $perPage){
        $this->perPage = $perPage;
    }

    /**
     * Set currect page
     * @param int $page
     */
    public function page(int $page){
        $this->page = $page;
    }

    /**
     * Set photo size
     * @param string $size
     */
    public function size(string $size){
        $this->size = $size;
    }

    /**
     * Set results color
     * @param string $color
     */
    public function color(string $color){
        $this->color = $color;
    }

    /**
     * Set results locale
     * @param string $locale
     */
    public function locale(string $locale){
        $this->locale = $locale;
    }

    /**
     * Set results orientation
     * @param string $orientation
     */
    public function orientation(string $orientation){
        $this->orientation = $orientation;
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'per_page'=> $this->perPage ?: config('pexels.per_page'),
            'page'=> $this->page ?: 1,
            'size'=> $this->size ?: config('pexels.size'),
            'color'=> $this->color,
            'locale'=> $this->locale ?: config('pexels.locale'),
            'orientation'=> $this->orientation ?: config('pexels.orientation'),
        ];
    }
}