@extends('layouts.master')
@section('title', 'Profile Page')
@section('content')
    <div class="container" id="app">

        @if (!empty($profile['display_name']))
            <h2 class="text-white">Welcome {{ $profile['display_name'] }}!</h2>
            <img class="profile-pic" src="{{ $profile['images'][0]['url'] }}" />
        @else
            <h2 class="text-white">Welcome user!</h2>
        @endif

        @include('includes.artists');

        <div class="row tracks">
            <h2 class="text-white">Your top 10 tracks all time</h2>
            @foreach ($tracks['items'] as $track)
                <h3 class="text-white">{{ $track['name'] }} <span> - <a href="{{ $track['external_urls']['spotify'] }}"
                            target="_blank">
                            Open track in Spotify
                        </a></span></h3>

                <p class="text-white mb-1">Preview song if available</p>
                <audio controls>
                    <source src="{{ $track['preview_url'] }}" type="audio/ogg">
                    Your browser does not support the audio element.
                </audio>
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
