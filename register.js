// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-auth.js";
import { getFirestore, collection, addDoc } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-firestore.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-analytics.js";

// Your web app's Firebase configuration
// const firebaseConfig = {
//     apiKey: "AIzaSyByjIleUa70TZ5KGTJojS6RVcNwfvcrYb0",
//     authDomain: "kwfasion-415e9.firebaseapp.com",
//     projectId: "kwfasion-415e9",
//     storageBucket: "kwfasion-415e9.appspot.com",
//     messagingSenderId: "716237104",
//     appId: "1:716237104:web:2d16cd7e4043aca82a40f5",
//     measurementId: "G-PTS4648HLZ"
// };

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth();
const db = getFirestore();
const analytics = getAnalytics(app);

// Get The Register Button
const register = document.getElementById("submit");

register.addEventListener("click", async function (event) {
  event.preventDefault();
  
  // Get input values
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  const firstName = document.getElementById("first-name").value;
  const lastName = document.getElementById("last-name").value;
  
  try {
    // Create user with email and password
    const userCredential = await createUserWithEmailAndPassword(auth, email, password);
    const user = userCredential.user;
    
    // Save additional user data to Firestore
    await addDoc(collection(db, "Users"), {
      uid: user.uid,
      email: email,
      firstName: firstName,
      lastName: lastName
    });

    // Alert user registered and redirect
    alert("User Registered");
    window.location.href = "index.html";
  } catch (error) {
    // Handle errors
    alert(error.message);
  }
});
