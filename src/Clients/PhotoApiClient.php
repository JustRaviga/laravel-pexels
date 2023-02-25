<?php

namespace JustRaviga\Pexels\Clients;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use JustRaviga\Pexels\Entities\PhotosSearchResponse;
use JustRaviga\Pexels\Exceptions\IncorrectPexelsApiKeyProvided;
use JustRaviga\Pexels\Exceptions\NoPexelsApiKeyProvided;
use JustRaviga\Pexels\Exceptions\NoPexelsResultsReturned;
use JustRaviga\Pexels\Exceptions\PexelsApiLimitExceeded;
use JustRaviga\Pexels\SearchOptions;
use Throwable;

class PhotoApiClient
{
    /**
     * Contains http client
     *
     * @var PendingRequest
     */
    private $httpClient;

    /**
     * Contains http client
     *
     * @var string
     */
    private string $pexelsApiBaseUrl = 'https://api.pexels.com/v1/';

    /**
     * ApiClient constructor
     *
     * @throws Throwable
     */
    public function __construct()
    {
        $apiKey = config('pexels.api_key');

        throw_unless($apiKey, new NoPexelsApiKeyProvided());

        $this->httpClient = Http::withHeaders(['Authorization' => $apiKey])->baseUrl($this->pexelsApiBaseUrl);
    }

    /**
     * Return search results
     *
     * @param  string  $searchQuery
     * @param  SearchOptions|null  $options
     *
     * @throws \JustRaviga\Pexels\Exceptions\NoPexelsResultsReturned
     * @throws \JustRaviga\Pexels\Exceptions\IncorrectPexelsApiKeyProvided
     * @return PhotosSearchResponse
     */
    public function search(string $searchQuery, SearchOptions $options = null)
    {
        $response = $this->httpClient->get(
            'search',
            array_merge(
                ['query' => $searchQuery],
                $options ? $options->toArray() : with(new SearchOptions())->toArray()
            )
        );

        $array = $response->json();

        if ($response->status() === 401) {
            throw new IncorrectPexelsApiKeyProvided();
        }

        if ($response->status() === 429) {
            throw new PexelsApiLimitExceeded();
        }

        if (! $response->ok()) {
            throw new NoPexelsResultsReturned(Arr::get($array, 'code'));
        }

        return PhotosSearchResponse::fromArray($array);
    }
}
