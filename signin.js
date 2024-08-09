// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-app.js";
import { getAuth, signInWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-auth.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-analytics.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyByjIleUa70TZ5KGTJojS6RVcNwfvcrYb0",
    authDomain: "kwfasion-415e9.firebaseapp.com",
    projectId: "kwfasion-415e9",
    storageBucket: "kwfasion-415e9.appspot.com",
    messagingSenderId: "716237104",
    appId: "1:716237104:web:2d16cd7e4043aca82a40f5",
    measurementId: "G-PTS4648HLZ"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
const auth = getAuth();



//submit button
const submit = document.getElementById('loginsubmit');
submit.addEventListener("click", function (event) {
    //inputs
    const email = document.getElementById('loginemail').value;
    const password = document.getElementById('loginpassword').value;
    event.preventDefault()
    signInWithEmailAndPassword(auth, email, password)
        .then((userCredential) => {
            // Signed up 
            const user = userCredential.user;
            alert("Successully Login...")
            window.location.href="index.html"
            // ...
        })
        .catch((error) => {
            const errorCode = error.code;
            const errorMessage = error.message;
            alert(errorMessage)
            // ..
        });
})