<?php

namespace App\Service;

use App\Sdk\SpotifyApi;

class Spotify
{
    /**
     * @var SpotifyApi
     */
    protected $spotifyApi;

    public function __construct(SpotifyApi $spotifyApi)
    {
        $this->spotifyApi = $spotifyApi;
    }

    public function performSearch($search, $limit, $offset, $album = null, $artist = null, $playlist = null, $track = null)
    {
        if (!$album && !$artist && !$playlist && !$track) {
            throw new \Exception("Please include at least one item");
        }

        if (!$search) {
            throw new \Exception("Please type at least one character");
        }

        if (!$limit || !intval($limit)) {
            throw new \Exception("Please specify valid limit");
        }

        $searchTypes = [];

        if ($album) {
            $searchTypes[] = 'album';
        }

        if ($artist) {
            $searchTypes[] = 'artist';
        }

        if ($playlist) {
            $searchTypes[] = 'playlist';
        }

        if ($track) {
            $searchTypes[] = 'track';
        }

        $parameters = [
            'type'          => implode(',', $searchTypes),
            'limit'         => $limit,
            'q'             => $search,
            'offset'        => $offset
        ];

        $apiResult = $this->spotifyApi->request('search', $this->spotifyApi::VERB_GET, $parameters);

        return $apiResult;
    }
}
