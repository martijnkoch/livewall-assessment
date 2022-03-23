# LiveWall Assesment

This is an assessment for LiveWall. Communicating with Spotify's API.  

## Install project

To install the project make sure you have PHP, composer and node.js installed on your system.
Pull in the project and:

```
composer install
npm install
```
Create a new database and add a new ENV file in the root folder of the project.
Add your database credentials to the ENV file. 
```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```
Also on Spotify their website create [a new project](https://developer.spotify.com/dashboard/applications) and add your project credentials to the ENV. 

```
SPOTIFY_CLIENT_ID=
SPOTIFY_CLIENT_SECRET=
SPOTIFY_REDIRECT_URI=
```

After this you can run the following Laravel commands:
```
php artisan migrate
php artisan key:generate
```

Now you should be good to go and you can run the project locally.

```
php artisan serve
npm run watch
```