@extends('layouts.app')
@section('content')
<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    <div class="container">
                        <form class="form" action="{{ url('form-submit') }}" method="get" id="search-form">
                            <div class="alert alert-danger" hidden="hidden" role="alert">There is an error</div>
                            <div class="form-row">
                                <div class="col-md-8 mb-3">
                                    <label for="search">Search</label>
                                    <input type="text" name="search" class="form-control required" id="search" placeholder="Search album, artist, playlist, track" value="" required>
                                    <div class="invalid-feedback">
                                        Please write at least one character
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="limit">Item Per Page</label>
                                     <select class="form-control required" name="limit" id="limit">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="album" id="album">
                                            <label class="form-check-label" for="album">
                                                Include Albums
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="artist" id="artist">
                                            <label class="form-check-label" for="artist">
                                                Include Artist
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="playlist" id="playlist">
                                            <label class="form-check-label" for="playlist">
                                                Include Playlist
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" name="track" id="track">
                                            <label class="form-check-label" for="track">
                                                Include Track
                                            </label>
                                            <div class="invalid-feedback">
                                                Please select at least one item
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                        <hr>
                        <div id="form-result">
                            <div id="albums-table-holder" class="container">
                                
                            </div>
                            <div id="artists-table-holder" class="container">
            
                            </div>
                            <div id="playlist-table-holder" class="container">

                            </div>
                            <div id="tracks-table-holder" class="container">

                            </div>
                        </nav>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection