const functions = require("firebase-functions");

// Create and Deploy Your First Cloud Functions
// https://firebase.google.com/docs/functions/write-firebase-functions
//const cors = require('cors')({origin: true});
const Busboy = require('busboy');

exports.helloWorld = functions.https.onRequest((req, res) => {

    res.set('Access-Control-Allow-Origin', '*');

    if (req.method === 'OPTIONS') {
        // Send response to OPTIONS requests
        res.set('Access-Control-Allow-Methods', '*');
        res.set('Access-Control-Allow-Headers', '*');
        res.set('Access-Control-Max-Age', '3600');
        res.status(204).send('ho');
    } else {

        res.send(Object.keys(req.query));

    }
});
