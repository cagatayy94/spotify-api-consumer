<?php
namespace App\Sdk;

class SpotifyApi
{
    const VERB_GET    = 'GET';
    const VERB_POST   = 'POST';
    const VERB_PUT    = 'PUT';
    const VERB_PATCH  = 'PATCH';
    const VERB_DELETE = 'DELETE';

    private $spotifyEndpoint;

    private $spotifyClientId;

    private $appToSpotifySecret;

    private $accessToken;

    public function __construct()
    {
        $this->spotifyEndpoint = env('SPOTIFY_ENDPOINT');
        $this->spotifyClientId = env('SPOTIFY_CLIENT_ID');
        $this->appToSpotifySecret = env('APP_TO_SPOTIFY_SECRET');
    }

    protected function obtainToken()
    {
        if ($this->accessToken) {
            return;
        }

        try {
            $clientId = $this->spotifyClientId;
            $clientSecret = $this->appToSpotifySecret;
            $this->endpoint = rtrim($this->spotifyEndpoint, '/');

            $url = 'https://accounts.spotify.com/api/token';

            // prepare the API call
            $curlHandler = curl_init();

            $parameters = [
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'grant_type' => 'client_credentials',
            ];

            curl_setopt($curlHandler, CURLOPT_POST, count($parameters));
            curl_setopt($curlHandler, CURLOPT_POSTFIELDS, http_build_query($parameters));

            curl_setopt($curlHandler, CURLOPT_URL, $url);
            curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, self::VERB_POST);

            curl_setopt($curlHandler, CURLOPT_HEADER, true);
            curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($curlHandler, CURLINFO_HEADER_OUT, true);

            // perform the API call
            $httpResponse = curl_exec($curlHandler);
            $httpCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);

            $headerSize = curl_getinfo($curlHandler, CURLINFO_HEADER_SIZE);
            $apiResult = substr($httpResponse, $headerSize);

            $jsonResult = json_decode($apiResult, true);

            if ($httpCode != 200) {
                throw new \Exception('API access error');
            }

            $this->accessToken = $jsonResult['access_token'];
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function request($resource, $verb, $parameters = [])
    {
        $this->obtainToken();

        $url = $this->spotifyEndpoint . $resource;

        // prepare the API call
        $curlHandler = curl_init();

        if (in_array($verb, [self::VERB_GET, self::VERB_DELETE])) {
            if (count($parameters)) {
                $url .= '?' . http_build_query($parameters);
            }
        } else {
            curl_setopt($curlHandler, CURLOPT_POST, count($parameters) > 0);

            if (count($parameters)) {
                curl_setopt($curlHandler, CURLOPT_POSTFIELDS, json_encode($parameters));
            }
        }

        curl_setopt($curlHandler, CURLOPT_URL, str_replace(' ', '%20', urldecode($url)));
        curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, $verb);
        curl_setopt($curlHandler, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->accessToken
        ]);

        curl_setopt($curlHandler, CURLOPT_HEADER, true);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curlHandler, CURLINFO_HEADER_OUT, true);

        // perform the API call
        $httpResponse = curl_exec($curlHandler);
        $httpCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);

        $headerSize = curl_getinfo($curlHandler, CURLINFO_HEADER_SIZE);
        $apiResult = substr($httpResponse, $headerSize);

        $jsonResult = json_decode($apiResult, true);

        if (!isset($jsonResult)) {
            throw new \Exception('Spotify: There is no result');
        }

        if ($httpCode != 200) {
            throw new \Exception('Spotify: Request failed');
        }

        return $jsonResult;
    }
}
