With login page working
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Neumorphic Auth</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: #e0e5ec;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 20px;
    }

    .container {
      background: #e0e5ec;
      padding: 2rem;
      border-radius: 25px;
      box-shadow: 10px 10px 30px #bec3c9, -10px -10px 30px #ffffff;
      width: 300px;
      transition: height 0.3s ease;
    }

    .tabs {
      display: flex;
      justify-content: space-between;
      margin-bottom: 1.5rem;
    }

    .tabs button {
      flex: 1;
      padding: 0.5rem;
      margin: 0 5px;
      border: none;
      border-radius: 15px;
      background: #e0e5ec;
      box-shadow: inset 5px 5px 10px #bec3c9,
                  inset -5px -5px 10px #ffffff;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .tabs .active {
      background: linear-gradient(145deg, #d1d9e6, #ffffff);
      box-shadow: inset 2px 2px 5px #bec3c9,
                  inset -2px -2px 5px #ffffff;
    }

    .form-container {
      position: relative;
    }

    .form {
      opacity: 0;
      transform: translateY(20px);
      transition: all 0.3s ease;
      pointer-events: none;
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
    }

    .form.active {
      opacity: 1;
      transform: translateY(0);
      pointer-events: all;
      position: relative;
    }

    .input-group {
      margin-bottom: 1rem;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
      font-size: 14px;
      color: #666;
    }

    .input-group input {
      width: 100%;
      padding: 0.5rem;
      border-radius: 10px;
      border: none;
      background: #e0e5ec;
      box-shadow: inset 3px 3px 6px #bec3c9,
                  inset -3px -3px 6px #ffffff;
      font-size: 14px;
      color: #555;
      transition: all 0.3s ease;
    }

    .input-group input:focus {
      outline: none;
      box-shadow: inset 2px 2px 5px #bec3c9,
                  inset -2px -2px 5px #ffffff;
    }

    .submit-btn {
      width: 100%;
      padding: 0.7rem;
      border: none;
      margin-top: 0.5rem;
      border-radius: 15px;
      background: #e0e5ec;
      box-shadow: 5px 5px 10px #bec3c9,
                  -5px -5px 10px #ffffff;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
      color: #555;
    }

    .submit-btn:hover {
      box-shadow: 3px 3px 8px #bec3c9,
                  -3px -3px 8px #ffffff;
    }

    .submit-btn:active {
      box-shadow: inset 2px 2px 5px #bec3c9,
                  inset -2px -2px 5px #ffffff;
    }

    .submit-btn i {
      margin-right: 5px;
    }

    .social {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-top: 1.5rem;
    }

    .social-icon {
      width: 40px;
      height: 40px;
      background: #e0e5ec;
      border-radius: 50%;
      box-shadow: 5px 5px 10px #bec3c9,
                  -5px -5px 10px #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      font-size: 18px;
      transition: all 0.3s ease;
    }

    .social-icon:hover {
      box-shadow: 3px 3px 8px #bec3c9,
                  -3px -3px 8px #ffffff;
    }

    .social-icon:active {
      box-shadow: inset 2px 2px 5px #bec3c9,
                  inset -2px -2px 5px #ffffff;
    }

    .or {
      text-align: center;
      margin-top: 1.2rem;
      font-size: 14px;
      color: #777;
    }

    .forgot-password {
      text-align: center;
      margin-top: 1rem;
      font-size: 12px;
      color: #777;
      text-decoration: none;
      display: block;
    }

    .forgot-password:hover {
      color: #555;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="tabs">
      <button id="loginBtn" onclick="showLogin()">Login</button>
      <button class="active" id="registerBtn" onclick="showRegister()">Register</button>
    </div>

    <div class="form-container">
      <!-- Login Form -->
      <div class="form" id="loginForm">
        <div class="input-group">
          <label>Email</label>
          <input type="email" placeholder="you@example.com" id="loginEmail" />
        </div>

        <div class="input-group">
          <label>Password</label>
          <input type="password" id="loginPassword" />
        </div>

        <button class="submit-btn" onclick="loginUser()">
          <i>🔑</i> Login
        </button>

        <a href="#" class="forgot-password">Forgot your password?</a>
      </div>

      <!-- Register Form -->
      <div class="form active" id="registerForm">
        <div class="input-group">
          <label>Full Name</label>
          <input type="text" placeholder="John Doe" id="name" />
        </div>

        <div class="input-group">
          <label>Email</label>
          <input type="email" placeholder="you@example.com" id="email" />
        </div>

        <div class="input-group">
          <label>Password</label>
          <input type="password" id="password" />
        </div>

        <div class="input-group">
          <label>Confirm Password</label>
          <input type="password" id="confirmPassword" />
        </div>

        <button class="submit-btn" onclick="registerUser()">
          <i>👤</i> Register
        </button>
      </div>
    </div>

    <div class="or">Or continue with</div>
    <div class="social">
      <div class="social-icon">G</div>
      <div class="social-icon">f</div>
      <div class="social-icon">🐦</div>
    </div>
  </div>

  <script>
    function showLogin() {
      document.getElementById('loginBtn').classList.add('active');
      document.getElementById('registerBtn').classList.remove('active');
      document.getElementById('loginForm').classList.add('active');
      document.getElementById('registerForm').classList.remove('active');
    }

    function showRegister() {
      document.getElementById('registerBtn').classList.add('active');
      document.getElementById('loginBtn').classList.remove('active');
      document.getElementById('registerForm').classList.add('active');
      document.getElementById('loginForm').classList.remove('active');
    }

    function loginUser() {
      const email = document.getElementById('loginEmail').value;
      const password = document.getElementById('loginPassword').value;

      if (!email || !password) {
        alert("Please fill out all fields.");
        return;
      }

      // Basic email validation
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return;
      }

      alert(`Welcome back! Login successful for ${email}`);
      // You can replace this with actual backend authentication
    }

    function registerUser() {
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirmPassword').value;

      if (!name || !email || !password || !confirmPassword) {
        alert("Please fill out all fields.");
        return;
      }

      // Basic email validation
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return;
      }

      if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return;
      }

      if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return;
      }

      alert(`Welcome ${name}! Registration successful.`);
      // You can replace this with actual backend code or Firebase integration.
    }
  </script>
</body>
</html>
