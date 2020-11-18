<?php

namespace App\Http\Controllers;

use App\Service\Spotify as SpotifyService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function formSubmit(Request $request, SpotifyService $spotifyService)
    {
        $search     = $request->request->get('search');
        $limit      = $request->request->get('limit');
        $album      = $request->request->get('album');
        $artist     = $request->request->get('artist');
        $playlist   = $request->request->get('playlist');
        $track      = $request->request->get('track');
        $offset     = $request->request->get('offset') ? $request->request->get('offset') : "0";


        try {
            $data = $spotifyService->performSearch($search, $limit, $offset, $album, $artist, $playlist, $track);

            return response()->json([
                'success' => true, 
                'data' => $data
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false, 
                'error'   => [
                    'message' => $e->getMessage()
                ]
            ]);
        }
    }
}
