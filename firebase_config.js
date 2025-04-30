// Ensure Firebase SDK is fully loaded
if (typeof firebase === 'undefined') {
    console.error('Firebase SDK not loaded. Check Firebase script inclusion.');
  }
  
  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyAgKho4fZwhtFI_3BQ6B9PGWZkeZx310pg",
    authDomain: "save-sathwa.firebaseapp.com",
    projectId: "save-sathwa",
    storageBucket: "save-sathwa.firebasestorage.app",
    messagingSenderId: "420315536794",
    appId: "1:420315536794:web:69943066a5d5b28543ee23",
    measurementId: "G-1G4G7X21B3"
  };
  
  // Initialize Firebase
  try {
    firebase.initializeApp(firebaseConfig);
    console.log('Firebase initialized successfully');
  } catch (error) {
    console.error('Firebase initialization error:', error);
  }
  
  // Initialize Firebase Authentication
  const auth = firebase.auth();
  
  // Google Sign-In Provider
  const googleProvider = new firebase.auth.GoogleAuthProvider();
  googleProvider.setCustomParameters({
    prompt: 'select_account' // Forces account selection prompt
  });
  
  function signInWithGoogle() {
    console.log('Google Sign-In button clicked');
    auth.signInWithPopup(googleProvider)
      .then((result) => {
        console.log('Google Sign-In successful:', result.user);
        const user = result.user;
        // Prepare form data to send to PHP
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'process_google_login.php';
        
        const uidField = document.createElement('input');
        uidField.type = 'hidden';
        uidField.name = 'uid';
        uidField.value = user.uid;
        form.appendChild(uidField);
  
        const nameField = document.createElement('input');
        nameField.type = 'hidden';
        nameField.name = 'name';
        nameField.value = user.displayName || 'Unknown';
        form.appendChild(nameField);
  
        const emailField = document.createElement('input');
        emailField.type = 'hidden';
        emailField.name = 'email';
        emailField.value = user.email || '';
        form.appendChild(emailField);
  
        const photoField = document.createElement('input');
        photoField.type = 'hidden';
        photoField.name = 'photo_url';
        photoField.value = user.photoURL || '';
        form.appendChild(photoField);
  
        document.body.appendChild(form);
        form.submit();
      })
      .catch((error) => {
        console.error('Google Sign-In Error:', error.code, error.message);
        alert('Error during Google Sign-In: ' + error.message);
      });
  }