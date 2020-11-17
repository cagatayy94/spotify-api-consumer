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
                            <div class="alert alert-danger" role="alert">There is an error</div>
                            <div class="form-row">
                                <div class="col-md-8 mb-3">
                                    <label for="search">Search</label>
                                    <input type="text" name="search" class="form-control is-invalid" id="search" placeholder="Search album, artist, playlist, track" value="" required>
                                    <div class="invalid-feedback">
                                        Please write at least one character
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="pagination">Item Per Page</label>
                                     <select class="form-control" name="pagination" id="pagination">
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
                                            <input class="form-check-input is-invalid" type="checkbox" value="1" name="album" id="album">
                                            <label class="form-check-label" for="album">
                                                Include Albums
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input is-invalid" type="checkbox" value="1" name="artist" id="artist">
                                            <label class="form-check-label" for="artist">
                                                Include Artist
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input is-invalid" type="checkbox" value="1" name="playlist" id="playlist">
                                            <label class="form-check-label" for="playlist">
                                                Include Playlist
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input is-invalid" type="checkbox" value="1" name="track" id="track">
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
                            <div class="container">
                                <h3>Albums</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Img</th>
                                            <th scope="col">Name<th>
                                            <th scope="col">Release Date</th>
                                            <th scope="col">Total Tracks</th>
                                            <th scope="col">Artists</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="col">
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67616d000048511e3d153c8ecda03a495ca811">
                                            </th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/album/6kvCH4eS92QkpBNdTmjLEz" target="_blank">Blues</a>
                                            <th>
                                            <th scope="col">1994-04-18</th>
                                            <th scope="col">11</th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/artist/776Uo845nYHJpNaStv1Ds4" target="_blank">Jimi Hendrix</a>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67616d000048511e3d153c8ecda03a495ca811">
                                            </th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/album/6kvCH4eS92QkpBNdTmjLEz" target="_blank">Blues</a>
                                            <th>
                                            <th scope="col">1994-04-18</th>
                                            <th scope="col">11</th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/artist/776Uo845nYHJpNaStv1Ds4" target="_blank">Jimi Hendrix</a>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67616d000048511e3d153c8ecda03a495ca811">
                                            </th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/album/6kvCH4eS92QkpBNdTmjLEz" target="_blank">Blues</a>
                                            <th>
                                            <th scope="col">1994-04-18</th>
                                            <th scope="col">11</th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/artist/776Uo845nYHJpNaStv1Ds4" target="_blank">Jimi Hendrix</a>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67616d000048511e3d153c8ecda03a495ca811">
                                            </th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/album/6kvCH4eS92QkpBNdTmjLEz" target="_blank">Blues</a>
                                            <th>
                                            <th scope="col">1994-04-18</th>
                                            <th scope="col">11</th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/artist/776Uo845nYHJpNaStv1Ds4" target="_blank">Jimi Hendrix</a>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67616d000048511e3d153c8ecda03a495ca811">
                                            </th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/album/6kvCH4eS92QkpBNdTmjLEz" target="_blank">Blues</a>
                                            <th>
                                            <th scope="col">1994-04-18</th>
                                            <th scope="col">11</th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/artist/776Uo845nYHJpNaStv1Ds4" target="_blank">Jimi Hendrix</a>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
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
                            <div class="container">
                                <h3>Artists</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Img</th>
                                            <th scope="col">Name<th>
                                            <th scope="col">Followers</th>
                                            <th scope="col">Popularity</th>
                                            <th scope="col">Genres</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="col">
                                                <img width="64" height="64" src="https://i.scdn.co/image/9b7abbcdb195e6f3be974c675525a9aeb584869e">
                                            </th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/artist/5AVBFCn4Hq4KY2Xjc5Gj4y" target="_blank">Blues Saraceno</a>
                                            <th>
                                            <th scope="col">88653</th>
                                            <th scope="col">57</th>
                                            <th scope="col">
                                                modern alternative rock, modern blues rock, rebel blues
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <img width="64" height="64" src="https://i.scdn.co/image/9b7abbcdb195e6f3be974c675525a9aeb584869e">
                                            </th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/artist/5AVBFCn4Hq4KY2Xjc5Gj4y" target="_blank">Blues Saraceno</a>
                                            <th>
                                            <th scope="col">88653</th>
                                            <th scope="col">57</th>
                                            <th scope="col">
                                                modern alternative rock, modern blues rock, rebel blues
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <img width="64" height="64" src="https://i.scdn.co/image/9b7abbcdb195e6f3be974c675525a9aeb584869e">
                                            </th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/artist/5AVBFCn4Hq4KY2Xjc5Gj4y" target="_blank">Blues Saraceno</a>
                                            <th>
                                            <th scope="col">88653</th>
                                            <th scope="col">57</th>
                                            <th scope="col">
                                                modern alternative rock, modern blues rock, rebel blues
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <img width="64" height="64" src="https://i.scdn.co/image/9b7abbcdb195e6f3be974c675525a9aeb584869e">
                                            </th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/artist/5AVBFCn4Hq4KY2Xjc5Gj4y" target="_blank">Blues Saraceno</a>
                                            <th>
                                            <th scope="col">88653</th>
                                            <th scope="col">57</th>
                                            <th scope="col">
                                                modern alternative rock, modern blues rock, rebel blues
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <img width="64" height="64" src="https://i.scdn.co/image/9b7abbcdb195e6f3be974c675525a9aeb584869e">
                                            </th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/artist/5AVBFCn4Hq4KY2Xjc5Gj4y" target="_blank">Blues Saraceno</a>
                                            <th>
                                            <th scope="col">88653</th>
                                            <th scope="col">57</th>
                                            <th scope="col">
                                                modern alternative rock, modern blues rock, rebel blues
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">
                                                <img width="64" height="64" src="https://i.scdn.co/image/9b7abbcdb195e6f3be974c675525a9aeb584869e">
                                            </th>
                                            <th scope="col">
                                                <a href="https://open.spotify.com/artist/5AVBFCn4Hq4KY2Xjc5Gj4y" target="_blank">Blues Saraceno</a>
                                            <th>
                                            <th scope="col">88653</th>
                                            <th scope="col">57</th>
                                            <th scope="col">
                                                modern alternative rock, modern blues rock, rebel blues
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
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
                            <div class="container">
                                <h3>Tracks</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Img</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Album</th>
                                            <th scope="col">Artists</th>
                                            <th scope="col">Popularity</th>
                                            <th scope="col">Track Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67616d0000485121e66a71d77140d90e8b12f8">
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/track/5Wh2O8fRff8CcMRn5GD1KW" target="_blank">Blues For My Baby And Me - Remastered 2017</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/album/2IrFfPpiIzEEkYoIsIwdQw" target="_blank">Jewel Box</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/artist/3PhoLpVuITZKcymswpck5b" target="_blank">Elton John</a>
                                            </td>
                                            <td>20</td>
                                            <td>13</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67616d0000485121e66a71d77140d90e8b12f8">
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/track/5Wh2O8fRff8CcMRn5GD1KW" target="_blank">Blues For My Baby And Me - Remastered 2017</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/album/2IrFfPpiIzEEkYoIsIwdQw" target="_blank">Jewel Box</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/artist/3PhoLpVuITZKcymswpck5b" target="_blank">Elton John</a>
                                            </td>
                                            <td>20</td>
                                            <td>13</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67616d0000485121e66a71d77140d90e8b12f8">
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/track/5Wh2O8fRff8CcMRn5GD1KW" target="_blank">Blues For My Baby And Me - Remastered 2017</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/album/2IrFfPpiIzEEkYoIsIwdQw" target="_blank">Jewel Box</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/artist/3PhoLpVuITZKcymswpck5b" target="_blank">Elton John</a>
                                            </td>
                                            <td>20</td>
                                            <td>13</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67616d0000485121e66a71d77140d90e8b12f8">
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/track/5Wh2O8fRff8CcMRn5GD1KW" target="_blank">Blues For My Baby And Me - Remastered 2017</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/album/2IrFfPpiIzEEkYoIsIwdQw" target="_blank">Jewel Box</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/artist/3PhoLpVuITZKcymswpck5b" target="_blank">Elton John</a>
                                            </td>
                                            <td>20</td>
                                            <td>13</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67616d0000485121e66a71d77140d90e8b12f8">
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/track/5Wh2O8fRff8CcMRn5GD1KW" target="_blank">Blues For My Baby And Me - Remastered 2017</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/album/2IrFfPpiIzEEkYoIsIwdQw" target="_blank">Jewel Box</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/artist/3PhoLpVuITZKcymswpck5b" target="_blank">Elton John</a>
                                            </td>
                                            <td>20</td>
                                            <td>13</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67616d0000485121e66a71d77140d90e8b12f8">
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/track/5Wh2O8fRff8CcMRn5GD1KW" target="_blank">Blues For My Baby And Me - Remastered 2017</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/album/2IrFfPpiIzEEkYoIsIwdQw" target="_blank">Jewel Box</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/artist/3PhoLpVuITZKcymswpck5b" target="_blank">Elton John</a>
                                            </td>
                                            <td>20</td>
                                            <td>13</td>
                                        </tr>
                                    </tbody>
                                </table>
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
                            <div class="container">
                                <h3>Playlists</h3>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Img</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Owner</th>
                                            <th scope="col">Tracks</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67706f00000003053676e87d17a88e7da65b56">
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/playlist/37i9dQZF1DXd9rSDyQguIk" target="_blank">Blues Classics</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/user/spotify" target="_blank">Spotify</a>
                                            </td>
                                            <td>70</td>
                                            <td>Nothing but classic blues tracks</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67706f00000003053676e87d17a88e7da65b56">
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/playlist/37i9dQZF1DXd9rSDyQguIk" target="_blank">Blues Classics</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/user/spotify" target="_blank">Spotify</a>
                                            </td>
                                            <td>70</td>
                                            <td>Nothing but classic blues tracks</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67706f00000003053676e87d17a88e7da65b56">
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/playlist/37i9dQZF1DXd9rSDyQguIk" target="_blank">Blues Classics</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/user/spotify" target="_blank">Spotify</a>
                                            </td>
                                            <td>70</td>
                                            <td>Nothing but classic blues tracks</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67706f00000003053676e87d17a88e7da65b56">
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/playlist/37i9dQZF1DXd9rSDyQguIk" target="_blank">Blues Classics</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/user/spotify" target="_blank">Spotify</a>
                                            </td>
                                            <td>70</td>
                                            <td>Nothing but classic blues tracks</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img width="64" height="64" src="https://i.scdn.co/image/ab67706f00000003053676e87d17a88e7da65b56">
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/playlist/37i9dQZF1DXd9rSDyQguIk" target="_blank">Blues Classics</a>
                                            </td>
                                            <td>
                                                <a href="https://open.spotify.com/user/spotify" target="_blank">Spotify</a>
                                            </td>
                                            <td>70</td>
                                            <td>Nothing but classic blues tracks</td>
                                        </tr>
                                    </tbody>
                                </table>
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
        console.log();
    });
</script>
@endsection
