<div class="row gy-5">
    <h2 class="text-white">Your top 10 artists all time</h2>

    <input type="text" id="seachInput" onkeyup="filterGenres()" placeholder="Filter by genre.."
        title="Type in a genre name">
    <table id="artistsTable">
        <tr class="header">
            <th></th>
            <th>Artist</th>
            <th>Genre</th>
            <th>Open artist in Spotify</th>
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