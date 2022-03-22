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