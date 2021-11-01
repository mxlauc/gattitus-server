require('./bootstrap');

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

window.app = createApp({
    components: {
        HeaderComponent,
        SimplePublicationComponent,
        CatItemComponent,
        CreatePublicationComponent,
        CreateCatComponent,
    }
});



// register service worker

if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw-worker.js').then(function(reg) {
        console.log('Service worker registration succeeded:', reg);
    }).catch(function(error) {
        console.log('Service worker registration failed:', error);
    });
}