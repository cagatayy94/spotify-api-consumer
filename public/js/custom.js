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
                        }else{
                            $('#albums-table-holder').html('');
                        }
                        if (result.data.artists) {
                            generateArtistTable(result.data.artists);
                        }else{
                            $('#artists-table-holder').html('');
                        }
                        if (result.data.playlists) {
                            generatePlaylistTable(result.data.playlists);
                        }else{
                            $('#playlist-table-holder').html('');
                        }
                        if (result.data.tracks) {
                            generateTracksTable(result.data.tracks);
                        }else{
                            $('#tracks-table-holder').html('');
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

    $('body').on('submit', '.pagination-form', function(e) {
        e.preventDefault();
        e.stopPropagation();

        var self = $(this);
        var url = 'form-submit';
        var method = 'GET'
        var data = self.serialize();

        $.ajax({
            type: method,
            url: url,
            data: data,
            success: function (result) {
                if (result.success) {
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
                }
            }
        });
    });

    $('body').on('click', '.page-link', function(e) {
        e.preventDefault();
        e.stopPropagation();

        var self = $(this);
        var form = self.closest('form');

        var requestedPage = self.attr('data-page');
        var limit = form.find('[name="limit"]').val();
        var currentPage = form.find('[name="currentPage"]').val();

        if (currentPage == requestedPage) {
            return false;
        }else{
            var offset;
            if (requestedPage != 1) {
                offset = (requestedPage - 1)*limit;
            }else{
                offset = 0;
            }
            
            form.find('input[name="offset"]').val(offset);
            form.submit();
        }
    });

    function generateAlbumTable(data){

        if (!data.items.length) {
            return false;
        }

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

        generatePagination(data, $('#albums-table-holder'));
    }

    function generateArtistTable(data){

        if (!data.items.length) {
            return false;
        }

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

            var img = value.images[0] ? value.images[0].url : '';

            table += '<tr>' +
                '<th scope="col">' +
                    '<img width="64" height="64" src="' + img + '">' +
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

        generatePagination(data, $('#artists-table-holder'));

    }

    function generatePlaylistTable(data){

        if (!data.items.length) {
            return false;
        }

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

        generatePagination(data, $('#playlist-table-holder'));
    }

    function generateTracksTable(data){

        if (!data.items.length) {
            return false;
        }

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

            albumImgUrl = value.album.images[0].url ? value.album.images[0].url : '';

            table += '<tr>' +
                '<th scope="col">' +
                    '<img width="64" height="64" src="' + albumImgUrl + '">' +
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

        generatePagination(data, $('#tracks-table-holder'));

    }

    function generatePagination(data, holder){
        var urlString       = data.href;
        var url             = new URL(urlString);
        var search          = url.searchParams.get("query");
        var type            = url.searchParams.get("type");
        var total           = data.total;
        var perPage         = data.limit;
        var pageCount       = Math.ceil(total / perPage);
        var currentPage     = (data.offset / data.limit) + 1;

        if (currentPage === Infinity) {
            currentPage = 1;
        }

        if (pageCount) {
            var startPage = currentPage - 5;
            var endPage = currentPage + 5;

            if (startPage <= 0) {
                endPage -= (startPage -1);
                startPage = 1;
            }

            if (endPage > pageCount) {
                endPage = pageCount;
            }

            var paginationElement = '<form class="pagination-form">' +
                                        '<input type="hidden" name="limit" value="'+ perPage +'">' +
                                        '<input type="hidden" name="' + type + '" value="1">' +
                                        '<input type="hidden" name="search" value="'+ search +'">' +
                                        '<input type="hidden" name="offset" value="">' +
                                        '<input type="hidden" name="currentPage" value="'+ currentPage +'"><nav aria-label="Page navigation example">' +
                                        '<ul class="pagination">';

            if (startPage > 1) {
                if (1 == currentPage) {
                    paginationElement += '<li class="page-item"><a data-page="1" class="page-link active" href="#">1</a></li>';
                }else{
                    paginationElement += '<li class="page-item"><a data-page="1" class="page-link" href="#">1</a></li>';
                }
            }

            var i;
            var classActive = "";
            for (i = startPage; i < endPage; i++) {

                if (i == currentPage) {
                    classActive = " active ";
                }else{
                    classActive = "";
                }

                paginationElement += '<li class="page-item ' + classActive + '"><a class="page-link" data-page="'+ i +'" href="#">'+ i + '</a></li>';
            }

            if (endPage < pageCount) {
                paginationElement += "<li><a>...</a></li>";
                if (pageCount == currentPage ) {
                    paginationElement += '<li class="page-item active"><a class="page-link" data-page="'+pageCount+'" href="#">'+ pageCount + '</a></li>';
                }else{
                    paginationElement += '<li class="page-item"><a class="page-link" data-page="'+pageCount+'" href="#">'+ pageCount + '</a></li>';
                }
            }

            paginationElement += "</ul></nav></form>";
            holder.append(paginationElement);
        }
    }
});