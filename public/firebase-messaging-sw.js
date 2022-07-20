// Add Firebase products that you want to use
importScripts('https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.6.1/firebase-messaging.js');

// Firebase SDK
firebase.initializeApp({
    apiKey: "AIzaSyDdYmnaD-evdjsUVXAEd_f2DIUE9ts00Y8",

    authDomain: "train-yourself-17ce0.firebaseapp.com",
  
    projectId: "train-yourself-17ce0",
  
    storageBucket: "train-yourself-17ce0.appspot.com",
  
    messagingSenderId: "143314527948",
  
    appId: "1:143314527948:web:63b299ee6f6ea419f88469",
  
    measurementId: "G-D7ERY898BN"
  
});

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message has received : ", payload);
    const title = "First, solve the problem.";
    const options = {
        body: "Push notificaiton!",
        icon: "/icon.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});
