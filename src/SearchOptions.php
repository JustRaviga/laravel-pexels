<?php

namespace JustRaviga\Pexels;

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
     * @return self
     */
    public function perPage(int $perPage){
        $this->perPage = $perPage;
        return $this;
    }

    /**
     * Set current page
     * @param int $page
     * @return self
     */
    public function page(int $page){
        $this->page = $page;
        return $this;
    }

    /**
     * Set photo size
     * @param string $size
     * @return self
     */
    public function size(string $size){
        $this->size = $size;
        return $this;
    }

    /**
     * Set results color
     * @param string $color
     * @return self
     */
    public function color(string $color){
        $this->color = $color;
        return $this;
    }

    /**
     * Set results locale
     * @param string $locale
     * @return self
     */
    public function locale(string $locale){
        $this->locale = $locale;
        return $this;
    }

    /**
     * Set results orientation
     * @param string $orientation
     * @return self
     */
    public function orientation(string $orientation){
        $this->orientation = $orientation;
        return $this;
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
