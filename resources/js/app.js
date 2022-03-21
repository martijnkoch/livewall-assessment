require('./bootstrap');

import { createApp } from 'vue'
import LoginComponent from './components/LoginComponent'
import TopArtists from './components/TopArtists'
const app = createApp({})

app
    .component('login', LoginComponent)
    .component('artists', TopArtists)
    .mount('#app')