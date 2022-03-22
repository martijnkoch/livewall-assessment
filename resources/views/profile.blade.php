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
        @include('includes.tracks');
        @include('includes.socials');

    </div>
@endsection
