<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{
    private $clientId;
    private $clientSecret;
    private $redirectUri;

    public function __construct()
    {
        $this->clientId = config('spotify.clientId');
        $this->clientSecret = config('spotify.clientSecret');
        $this->redirectUri = config('spotify.redirectUri');
    }

    public function login()
    {
        //Scopes for all the API data I want 
        $scopes = 'user-read-private user-read-email user-top-read';
        return redirect(
            'https://accounts.spotify.com/authorize' .
                '?response_type=code' .
                '&client_id=' . $this->clientId .
                ($scopes ? '&scope=' . urlencode($scopes) : '') .
                '&redirect_uri=' . urlencode($this->redirectUri)
        );
    }

    public function getToken()
    {
        $code = $_GET['code'];

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret)
        ])->asForm()
            ->post('https://accounts.spotify.com/api/token', [
                'code' => trim($code),
                'redirect_uri' => $this->redirectUri,
                'grant_type' => 'authorization_code',
            ]);

        return $response->json()['access_token'];
    }

    public function getUserData()
    {
        $token = $this->getToken();
        $bearer = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ]);

        //Spotify api endpoints
        $profileInfo = 'https://api.spotify.com/v1/me';
        $topArtists = 'https://api.spotify.com/v1/me/top/artists?time_range=long_term&limit=10&offset=0';
        $topTracks = 'https://api.spotify.com/v1/me/top/tracks?time_range=long_term&limit=10&offset=0';

        //Return the profile info
        $profile = $bearer
            ->get($profileInfo)
            ->json();

        //Return the top 10 artists and save to the database
        $artists = $bearer
            ->get($topArtists)
            ->json();

        foreach ($artists as $artist) {
            foreach ((array)$artist as $value) {
                if (is_array($value)) {
                    $artist = new Artist;
                    $artist->name = $value['name'];
                    $artist->url = $value['href'];
                    $artist->save();
                }
            }
        }

        //Return the top 10 songs and save to the database
        $tracks = $bearer
            ->get($topTracks)
            ->json();

        foreach ($tracks as $track) {
            foreach ((array)$track as $value) {
                if (is_array($value)) {
                    $track = new Track;
                    $track->name = $value['name'];
                    $track->url = $value['external_urls']['spotify'];
                    $track->save();
                }
            }
        }

        return view('profile')
            ->with(['profile' => $profile])
            ->with(['artists' => $artists])
            ->with(['tracks' => $tracks]);
    }

    public function storeArtists()
    {
    }
}
