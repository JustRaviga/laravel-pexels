<?php

namespace DeDmytro\Pexels\Clients;

use DeDmytro\Pexels\Entities\PhotosSearchResponse;
use DeDmytro\Pexels\Exceptions\NoPexelsApiKeyProvided;
use DeDmytro\Pexels\SearchOptions;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Throwable;

class PhotoApiClient
{
    /**
     * Contains http client
     * @var PendingRequest
     */
    private $httpClient;

    /**
     * Contains http client
     * @var string
     */
    private string $pexelsApiBaseUrl = 'https://api.pexels.com/v1/';

    /**
     * ApiClient constructor
     * @throws Throwable
     */
    public function __construct()
    {
        $apiKey = config('pexels.api_key');

        throw_unless($apiKey, new NoPexelsApiKeyProvided());

        $this->httpClient = Http::withToken($apiKey)->baseUrl($this->pexelsApiBaseUrl);
    }

    /**
     * Return search results
     * @param string $searchQuery
     * @param SearchOptions|null $options
     * @return PhotosSearchResponse
     */
    public function search(string $searchQuery, SearchOptions $options = null)
    {
        $array = $this->httpClient->get('search', array_merge([
            'query' => $searchQuery,
            $options ? $options->toArray() : []
        ]))->json();

        return PhotosSearchResponse::fromArray($array);
    }
}