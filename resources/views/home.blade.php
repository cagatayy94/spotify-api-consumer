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
                                <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="artists-table-holder" class="container">
                                <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="playlist-table-holder" class="container">
                                <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="tracks-table-holder" class="container">
                                <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $('#search-form').on('submit', function (e) {
            e.preventDefault();
            e.stopPropagation();

            $('.alert-danger').attr('hidden', 'hidden');

            var self = $(this);
            var url = self.attr('action');
            var method = self.attr('method');
            var data = self.serialize();

            self.find('[type="submit"]').attr('disabled', 'disabled');

            var isValid = true;

            self.find('.required').each(function() {
                if (!$(this).val().length > 0 || $(this).val() == '') {
                    isValid = false;
                    $(this, "input").addClass('is-invalid');
                } else {
                    $(this, "input").removeClass('is-invalid');
                }
            });

            if (isValid) {
                $.ajax({
                    type: method,
                    url: url,
                    data: data,
                    success: function (result) {
                        if (result.success) {
                            $('.alert-danger').attr('hidden', 'hidden');
                            self.find('[type="submit"]').removeAttr('disabled');
                            if (result.data.albums) {
                                generateAlbumTable(result.data.albums);
                            }
                            if (result.data.artists) {
                                generateArtistTable(result.data.artists);
                            }
                            if (result.data.playlists) {
                                generatePlaylistTable(result.data.playlists);
                            }
                            if (result.data.tracks) {
                                generateTracksTable(result.data.tracks);
                            }
                        } else {
                            $('.alert-danger').removeAttr('hidden').text(result.error.message);
                            self.find('[type="submit"]').removeAttr('disabled');
                        }
                    }
                });
            } else {
                self.find('[type="submit"]').removeAttr('disabled');
            }
        });
    });

    function generateAlbumTable(data){
        var table = '<h3>Albums</h3>' +
                    '<table class="table">' +
                        '<thead>' +
                            '<tr>' +
                                '<th scope="col">Img</th>' +
                                '<th scope="col">Name<th>' +
                                '<th scope="col">Release Date</th>' +
                                '<th scope="col">Total Tracks</th>' +
                                '<th scope="col">Artists</th>' +
                            '</tr>' +
                        '</thead>' +
                        '<tbody>';

        $.each(data.items, function (key, value) {
            table += '<tr>' +
                '<th scope="col">' +
                    '<img width="64" height="64" src="' + value.images[0].url + '">' +
                '</th>' +
                '<th scope="col">' +
                    '<a href="' + value.external_urls.spotify + '" target="_blank">' + value.name + '</a>' +
                '<th>' +
                '<th scope="col">' + value.release_date + '</th>' +
                '<th scope="col">' + value.total_tracks + '</th>' +
                '<th scope="col">' +
                    '<a href="' + value.artists[0].external_urls.spotify + '" target="_blank">' + value.artists[0].name + '</a>' +
                '</th>' +
            '</tr>';
        });

        table += '</tbody></table>';

        $('#albums-table-holder').html(table);
    }

    function generateArtistTable(data){
        var table = '<h3>Artists</h3>' +
                    '<table class="table">' +
                        '<thead>' +
                            '<tr>' +
                                '<th scope="col">Img</th>' +
                                '<th scope="col">Name<th>' +
                                '<th scope="col">Followers</th>' +
                                '<th scope="col">Popularity</th>' +
                                '<th scope="col">Genres</th>' +
                            '</tr>' +
                        '</thead>' +
                        '<tbody>';

        $.each(data.items, function (key, value) {
            table += '<tr>' +
                '<th scope="col">' +
                    '<img width="64" height="64" src="' + value.images[0].url + '">' +
                '</th>' +
                '<th scope="col">' +
                    '<a href="' + value.external_urls.spotify + '" target="_blank">' + value.name + '</a>' +
                '<th>' +
                '<th scope="col">' + value.followers.total + '</th>' +
                '<th scope="col">' + value.popularity + '</th>' +
                '<th scope="col">' +
                    value.genres +
                '</th>' +
            '</tr>';
        });

        table += '</tbody></table>';

        $('#artists-table-holder').html(table);
    }

    function generatePlaylistTable(data){
        var table = '<h3>Playlist</h3>' +
                    '<table class="table">' +
                        '<thead>' +
                            '<tr>' +
                                '<th scope="col">Img</th>' +
                                '<th scope="col">Name<th>' +
                                '<th scope="col">Owner</th>' +
                                '<th scope="col">Tracks</th>' +
                                '<th scope="col">Description</th>' +
                            '</tr>' +
                        '</thead>' +
                        '<tbody>';

        $.each(data.items, function (key, value) {
            table += '<tr>' +
                '<th scope="col">' +
                    '<img width="64" height="64" src="' + value.images[0].url + '">' +
                '</th>' +
                '<th scope="col">' +
                    '<a href="' + value.external_urls.spotify + '" target="_blank">' + value.name + '</a>' +
                '<th>' +
                '<th scope="col">' +
                    '<a href="' + value.owner.external_urls.spotify + '" target="_blank">' + value.owner.display_name +'</a>' +
                '</th>' +
                '<th scope="col">' + value.tracks.total + '</th>' +
                '<th scope="col">' +
                    value.description +
                '</th>' +
            '</tr>';
        });

        table += '</tbody></table>';

        $('#playlist-table-holder').html(table);
    }

    function generateTracksTable(data){
        var table = '<h3>Tracks</h3>' +
                    '<table class="table">' +
                        '<thead>' +
                            '<tr>' +
                                '<th scope="col">Img</th>' +
                                '<th scope="col">Name<th>' +
                                '<th scope="col">Album</th>' +
                                '<th scope="col">Artists</th>' +
                                '<th scope="col">Popularity</th>' +
                                '<th scope="col">Track Number</th>' +
                            '</tr>' +
                        '</thead>' +
                        '<tbody>';

        $.each(data.items, function (key, value) {
            table += '<tr>' +
                '<th scope="col">' +
                    '<img width="64" height="64" src="' + value.album.images[0].url + '">' +
                '</th>' +
                '<th scope="col">' +
                    '<a href="' + value.external_urls.spotify + '" target="_blank">' + value.name + '</a>' +
                '<th>' +
                '<th scope="col">' +
                    '<a href="' + value.album.external_urls.spotify + '" target="_blank">' + value.album.name +'</a>' +
                '</th>' +
                '<th scope="col">' +
                    '<a href="' + value.artists[0].external_urls.spotify + '" target="_blank">' + value.artists[0].name +'</a>' +
                '</th>' +
                '<th scope="col">' +
                    value.popularity +
                '</th>' +
                '<th scope="col">' +
                    value.track_number +
                '</th>' +
            '</tr>';
        });

        table += '</tbody></table>';

        $('#tracks-table-holder').html(table);
    }
</script>
@endsection
