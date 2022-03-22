@extends('layouts.master')
@section('title', 'Profile Page')
@section('content')
    <div class="container" id="app">

        <h2 class="text-white">Welcome {{ $profile['display_name'] }}!</h2>
        <img class="profile-pic" src="{{ $profile['images'][0]['url'] }}" />

        <div class="row gy-5">
            <h2 class="text-white">Your top 10 artists</h2>

            <input type="text" id="seachInput" onkeyup="filterGenres()" placeholder="Filter by genre.."
                title="Type in a genre name">
            <table id="artistsTable">
                <tr class="header">
                    <th></th>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Open artist on Spotify</th>
                </tr>
                @foreach ($artists['items'] as $artist)
                    <tr>
                        <td width="20%"><img src="{{ $artist['images'][0]['url'] }}" /> </td>
                        <td>{{ $artist['name'] }}</td>
                        <td>{{ ucfirst($artist['genres'][0]) }}</td>
                        <td><a href="{{ $artist['external_urls']['spotify'] }}" target="_blank">Open artist Page</a></td>
                    </tr>
                @endforeach
            </table>
        </div>


        <div class="row">
            <h2 class="text-white">Your top 10 tracks</h2>
            @foreach ($tracks['items'] as $track)
                <a href="{{ $track['external_urls']['spotify'] }}">
                    <h3>{{ $track['name'] }}</h3>
                </a>
            @endforeach
        </div>

        <ul class="share-buttons" data-source="simplesharingbuttons.com">
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmarijnp2.sg-host.com&quote="
                    title="Share on Facebook" target="_blank"
                    onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&quote=' + encodeURIComponent(document.URL)); return false;"><img
                        alt="Share on Facebook" src="{{ asset('img/Facebook.png') }}" /></a></li>
            <li><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fmarijnp2.sg-host.com&text=:%20http%3A%2F%2Fmarijnp2.sg-host.com"
                    target="_blank" title="Tweet"
                    onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><img
                        alt="Tweet" src="{{ asset('img/Twitter.png') }}" /></a></li>
            <li><a href="http://www.tumblr.com/share?v=3&u=http%3A%2F%2Fmarijnp2.sg-host.com&quote=&s=" target="_blank"
                    title="Post to Tumblr"
                    onclick="window.open('http://www.tumblr.com/share?v=3&u=' + encodeURIComponent(document.URL) + '&quote=' +  encodeURIComponent(document.title)); return false;"><img
                        alt="Post to Tumblr" src="{{ asset('img/Tumblr.png') }}" /></a></li>
            <li><a href="http://www.reddit.com/submit?url=http%3A%2F%2Fmarijnp2.sg-host.com&title=" target="_blank"
                    title="Submit to Reddit"
                    onclick="window.open('http://www.reddit.com/submit?url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><img
                        alt="Submit to Reddit" src="{{ asset('img/Reddit.png') }}" /></a></li>
        </ul>
    </div>

@endsection
