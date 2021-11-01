require('./bootstrap');

window.bootstrap = require('bootstrap');;


import { initializeApp } from "firebase/app";
import { getAuth, signInWithCredential, FacebookAuthProvider, onAuthStateChanged, signOut } from "firebase/auth";

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyC2g2EJ_E_Eu8uvSDc-pZ1K-Oegnyu-B-U",
    authDomain: "proyectoxdxd-6a713.firebaseapp.com",
    projectId: "proyectoxdxd-6a713",
    storageBucket: "proyectoxdxd-6a713.appspot.com",
    messagingSenderId: "504996135082",
    appId: "1:504996135082:web:c27174715f3d1299c6d0d3"
};

// Initialize Firebase
initializeApp(firebaseConfig);

const auth = getAuth()


function get_cookie(name) {
    let value = null;
    document.cookie.split(';').forEach(c => {
        let cookie = c.trim().split("=");
        if (cookie[0] == name) {
            value = cookie[1];
        }
    });
    return value;
}

onAuthStateChanged(auth, (user) => {
    if (user) {
        console.log('usuario logeado');
    } else {
        let login_token_to_firebase = get_cookie('login_token_to_firebase');
        if (login_token_to_firebase) {//inicio sesion en laravel, ahora iniciamos sesion en js
            const credential = FacebookAuthProvider.credential(login_token_to_firebase);
            // Sign in with the credential from the Facebook user.
            signInWithCredential(auth, credential)
                .then(result => {
                    console.log('usuario logeado por facebook');
                })
                .catch((error) => {
                    if (error.code == "auth/invalid-credential") {
                        console.log("credencial no es valido");

                        // borrar cookie
                        document.cookie = "login_token_to_firebase=; max-age=0";

                        // hacer logout en propio servidor
                        signOut(auth).then(() => {
                            // Sign-out successful.
                          }).catch((error) => {
                            // An error happened.
                          });
                    }
                });

        }
    }
});


import { createApp, provide } from 'vue';
import HeaderComponent from './components/HeaderComponent.vue';

import SimplePublicationComponent from './components/SimplePublicationComponent.vue';
import CatItemComponent from './components/CatItemComponent.vue';
import CreatePublicationComponent from './components/CreatePublicationComponent.vue';
import CreateCatComponent from './components/CreateCatComponent.vue';
import VWave from 'v-wave';
import { Lang } from 'laravel-vue-lang';


let mixin = {
    methods: {
        timeAgo(date){
            var ahora = Date.now();
            var diferencia = (ahora/ 1000) - date;
            if(diferencia < 60){
                return this.__('A moment ago');
            }else if(diferencia < 60 * 60){
                var m = Math.trunc(diferencia / 60);
                return m == 1
                    ? this.__('A minute ago')
                    : this.__('minutes ago', {minutes: m});
            }else if(diferencia < 60 * 60 * 24){
                var h = Math.trunc(diferencia / 60 / 60);
                return h == 1
                    ? this.__('A hour ago')
                    : this.__('hours ago', {hours: h});
            }else if (diferencia < 60 * 60 * 24 * 4){
                var d = Math.trunc(diferencia / 60 / 60 / 24);
                return d == 1
                    ? this.__('A day ago')
                    : this.__('days ago', {days: d});
            }else{
                var meses = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                var fecha = new Date(date * 1000);
                var d = fecha.getDate();
                var m = meses[fecha.getMonth()];
                var h = fecha.getHours();
                var y = fecha.getFullYear();
                var mm = fecha.getMinutes();
                return this.__('date', {year: y, month: this.__(m), day:d, hours: h, minutes: mm < 10 ? '0' + mm : mm});
            }
        },
        mostrarLoginModal(){
            var modal = bootstrap.Modal.getOrCreateInstance(document.querySelector('#loginModal'));
            modal.show();
        }
    }
};

window.app = createApp({
    components: {
        HeaderComponent,
        SimplePublicationComponent,
        CatItemComponent,
        CreatePublicationComponent,
        CreateCatComponent,
    }
})
.use(VWave)
.use(Lang);
app.mixin(mixin);


// register service worker

if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw-worker.js').then(function(reg) {
        console.log('Service worker registration succeeded:', reg);
    }).catch(function(error) {
        console.log('Service worker registration failed:', error);
    });
}