container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');
const registerForm = document.getElementById('register-form');
const loginForm = document.getElementById('login-form');


registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

// Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyCFaogl5vUk_EXTTC0QqwgRTBjrpgHXqzE",
    authDomain: "infnityy-863c2.firebaseapp.com",
    projectId: "infnityy-863c2",
    storageBucket: "infnityy-863c2.appspot.com",
    messagingSenderId: "900284260441",
    appId: "1:900284260441:web:92eacbda2b8a02128f5148",
    measurementId: "G-M6J61L4DMM"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
const auth = firebase.auth();

// Register User
document.getElementById('register-btn').addEventListener('click', () => {
    const email = document.getElementById('register_email').value;
    const password = document.getElementById('register_password').value;

    auth.createUserWithEmailAndPassword(email, password)
        .then((userCredential) => {
            alert('Account created successfully!');
            console.log(userCredential.user);
            window.location.href = "index.html";
        })
        .catch((error) => {
            console.error(error);
            alert('Registration failed: ' + error.message);
        });
});

// Login User
document.getElementById('login-btn').addEventListener('click', () => {
    const email = document.getElementById('login_email').value;
    const password = document.getElementById('login_password').value;

    auth.signInWithEmailAndPassword(email, password)
        .then((userCredential) => {
            alert('Logged in successfully!');
            console.log(userCredential.user);
            window.location.href = "index.html";
        })
        .catch((error) => {
            console.error(error);
            alert('Login failed: ' + error.message);
        });
});