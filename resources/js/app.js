require('./bootstrap');


// Import the functions you need from the SDKs you need
window.firebase = require("firebase/storage");
import { initializeApp } from "firebase/app";
import { getAuth, signInWithCredential, FacebookAuthProvider, onAuthStateChanged, signOut } from "firebase/auth";

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

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
const app = initializeApp(firebaseConfig);

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
        console.log(user);
        const uid = user.uid;
        // ...
    } else {
        console.log("no hay usuario");
        let login_token_to_firebase = get_cookie('login_token_to_firebase');
        if (login_token_to_firebase) {//inicio sesion en laravel, ahora iniciamos sesion en js

            const credential = FacebookAuthProvider.credential(
                login_token_to_firebase
            );

            // Sign in with the credential from the Facebook user.
            signInWithCredential(auth, credential)
                .then(result => {
                    console.log(result);
                    console.log(FacebookAuthProvider.credentialFromResult(result).accessToken);
                    console.log(auth.currentUser);
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
import CrearPublicacionComponent from './components/CreatePublicationComponent.vue';
import { result } from "lodash";

window.app = createApp({
    components: {
        HeaderComponent,
        CrearPublicacionComponent,
    }
});



