/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/8.9.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.9.0/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({
     apiKey: "AIzaSyBPURVyabGzv_Ux8kEHgwRks41zmNSrDts",
    authDomain: "joinradix-898ba.firebaseapp.com",
    projectId: "joinradix-898ba",
    storageBucket: "joinradix-898ba.appspot.com",
    messagingSenderId: "710346887222",
    appId: "1:710346887222:web:e53d44da5c23d1b32a0897",
    measurementId: "G-TPR65MYC5D"
});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
  console.log(
    "[firebase-messaging-sw.js] Received background message ",
    payload,
  );
  /* Customize notification here */
  const notificationTitle = "Uva Test Notification";
  const notificationOptions = {
    body: "Test by Uva .",
    icon: "/itwonders-web-logo.png",
  };

  return self.registration.showNotification(
    notificationTitle,
    notificationOptions,
  );
});
