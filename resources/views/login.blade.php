<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  
  <style>

    body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    }

    .container {
    max-width: 400px;
    margin: 100px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .container h1 {
    text-align: center;
    margin-bottom: 20px;
    }

    .container input[type="text"],
  .container input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
    }

  .container button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
   }

   @media (max-width: 480px) {
    .container {
      margin-top: 50px;
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
        <input type="email" name="email" placeholder="Email" required class="form-control bg-secondary text-light border-0"/> 
      </div>

      <div class="form-check mb-3">
        <input type="password" name="password" placeholder="Password" required class="form-control bg-secondary text-light border-0"/> 
      </div>
     
      <label class="form-check-label" for="remember">
        <div class="form-check mb-3">
            <input type="checkbox" name="remember" class="form-check-input">Remember Me
        </div>
      </label>

      <button type="submit" class="btn btn-primary w-100">Submit</button>

    </form> 
</div>

</body>