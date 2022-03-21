@extends('layouts.master')
@section('title', 'Login Page')
@section('content')
    <div class="container" id="app">
        
        <h2 class="text-white">Welcome {{ $profile['display_name'] }}!</h2>
        
        <div class="row">
            <h2 class="text-white">Your top 10 artists</h2>
            @foreach ($artists['items'] as $artist)
                <div class="col-4 artistcard mb-3 p-0">
                    <img src="{{ $artist['images'][0]['url'] }}" />
                    <h3>{{ $artist['name'] }}</h3>
                </div>
            @endforeach
        </div>
    
        <div class="row">
            <h2 class="text-white">Your top 10 tracks</h2>
            @foreach ($tracks['items'] as $track)
                <a href="{{ $track['external_urls']['spotify'] }}">
                    <h3>{{ $track['name'] }}</h3>
                </a>
            @endforeach
        </div>
    </div>
    
@endsection
