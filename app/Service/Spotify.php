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

    public function performSearch($search, $pagination, $album = null, $artist = null, $playlist = null, $track = null)
    {
        if (!$album && !$artist && !$playlist && !$track) {
            throw new \Exception("Please select at least one item");
        }

        if (!$search) {
            throw new \Exception("Please type at least one character");
        }

        if (!$pagination || !intval($pagination)) {
            throw new \Exception("Please specify valid limit");
        }

        
        
        return func_get_args();
    }


}
