<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <h2>Top artists</h2>
    
    <p>Land: {{$profile['country']}} </p>
    <p>Naam: {{$profile['display_name']}} </p>
    <p>Email: {{$profile['email']}} </p>
    <img src="{{$profile['images'][0]['url']}}" alt="profile">
    
</body>
</html>