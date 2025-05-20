<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  
  <style>
    body {
      font-family: 'Roboto', sans-serif; /* Use a modern font */
      background: linear-gradient(to right, #6a11cb, #2575fc); /* Gradient background */
      margin: 0;
      padding: 0;
      display: flex; /* Use flexbox for centering */
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .container {
      max-width: 450px; /* Slightly wider container */
      background-color: #fff;
      padding: 40px; /* More padding */
      border-radius: 10px; /* More rounded corners */
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); /* Stronger shadow */
      text-align: center; /* Center content within the container */
    }

    .container h1 {
      text-align: center;
      margin-bottom: 30px; /* More space below heading */
      color: #333; /* Darker heading color */
    }

    .container input[type="text"],
    .container input[type="email"], /* Added email type */
    .container input[type="password"] {
      width: 100%;
      padding: 12px 15px; /* Increased padding */
      margin-bottom: 20px; /* More space between inputs */
      border: 1px solid #ddd; /* Lighter border */
      border-radius: 5px; /* Slightly more rounded input fields */
      box-sizing: border-box;
      font-size: 1rem; /* Standard font size */
    }

    .container button {
      width: 100%;
      padding: 12px;
      font-size: 1.1rem; /* Larger font for button */
    }

   @media (max-width: 480px) {
    .container {
      padding: 20px; /* Reduced padding on smaller screens */
    }
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <h1>Login</h1> 
  <form method="POST" action="{{ route('login.attempt') }}"> 
    
    @csrf
    
    <x-form-errors></x-form-errors>
    
    <div class="mb-3">
      <input type="email" name="email" placeholder="Email" required class="form-control border-0 shadow-sm"/> 
    </div>

    <div class="mb-3">
      <input type="password" name="password" placeholder="Password" required class="form-control border-0 shadow-sm"/> 
    </div>
   
    <div class="d-flex justify-content-between align-items-center mb-4"> {/* Flexbox for Remember Me and Forgot Password */}
        <div class="form-check mb-3">
          <input type="checkbox" name="remember" id="remember" class="form-check-input">
          <label class="form-check-label" for="remember">Remember Me</label>
      </div>
      <a href="#" class="text-decoration-none">Forgot Password?</a> {/* Added Forgot Password link */}
    </div>

    <button type="submit" class="btn btn-primary w-100 py-2">Login</button> {/* Changed button text and added padding */}

    </form> 
</div>

</body>