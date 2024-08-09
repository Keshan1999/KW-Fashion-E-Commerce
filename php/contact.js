import { initializeApp } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-app.js";
import { getAuth, createUserWithEmailAndPassword } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-auth.js";
import { getFirestore, collection, addDoc } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-firestore.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.10.0/firebase-analytics.js";

 // Initialize Firebase
const firebaseConfig = {
    apiKey: "AIzaSyByjIleUa70TZ5KGTJojS6RVcNwfvcrYb0",
    authDomain: "kwfasion-415e9.firebaseapp.com",
    projectId: "kwfasion-415e9",
    storageBucket: "kwfasion-415e9.appspot.com",
    messagingSenderId: "716237104",
    appId: "1:716237104:web:2d16cd7e4043aca82a40f5",
    measurementId: "G-PTS4648HLZ"
};

firebase.initializeApp(config);

// Reference messages collection
var formDataDB = firebase.database().ref('formData');

// Listen for form submit
document.getElementById('formData').addEventListener('submit', submitForm);

// Submit form
function submitForm(e){
  e.preventDefault();

  //Get value
  var name = getInputVal('name');
  var email = getInputVal('email');
  var subject = getInputVal('subject');
  var message = getInputVal('message');

  // Save message
  saveMessage(name, email, subject, message);

  // Show alert
  document.querySelector('.alert').style.display = 'block';

  // Hide alert after 3 seconds
  setTimeout(function(){
    document.querySelector('.alert').style.display = 'none';
  },3000);

  // Clear form
  document.getElementById('formData').reset();
}

// Function to get form value
function getInputVal(id){
  return document.getElementById(id).value;
}

// Save message to firebase
function saveMessage(name, email, subject, message){
  var newFormData = formDataDB.push();
  newFormData.set({
    name: name,
    email: email,
    subject: subject,
    message: message
  });
}
  