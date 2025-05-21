<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  
  <style>
   @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

*,*:before,*:after{box-sizing:border-box}

body{
  min-height:100vh;
  font-family: 'Raleway', sans-serif;
}

.container{
  position:absolute;
  width:100%;
  height:100%;
  overflow:hidden;
  
  &:hover,&:active{
    .top, .bottom{
      &:before, &:after{
        margin-left: 200px;
        transform-origin: -200px 50%;
        transition-delay:0s;
      }
    }
    
    .center{
      opacity:1;
      transition-delay:0.2s;
    }
  }
}

.top, .bottom{
  &:before, &:after{
    content:'';
    display:block;
    position:absolute;
    width:200vmax;
    height:200vmax;
    top:50%;left:50%;
    margin-top:-100vmax;
    transform-origin: 0 50%;
    transition:all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
    z-index:10;
    opacity:0.65;
    transition-delay:0.2s;
  }
}

.top{
  &:before{transform:rotate(45deg);background:#e46569;}
  &:after{transform:rotate(135deg);background:#ecaf81;}
}

.bottom{
  &:before{transform:rotate(-45deg);background:#60b8d4;}
  &:after{transform:rotate(-135deg);background:#3745b5;}
}

.center{
  position:absolute;
  width:400px;
  height:400px;
  top:50%;left:50%;
  margin-left:-200px;
  margin-top:-200px;
  display:flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding:30px;
  opacity:0;
  transition:all 0.5s cubic-bezier(0.445, 0.05, 0, 1);
  transition-delay:0s;
  color:#333;
  
  input{
    width:100%;
    padding:15px;
    margin:5px;
    border-radius:1px;
    border:1px solid #ccc;
    font-family:inherit;
  }
}
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container" onclick="onclick">
  <h2>Please Sign In</h2> 
  <h2>&nbsp</h2>
  <form method="POST" action="{{ route('login.attempt') }}"> 
    
    @csrf
    
    <x-form-errors></x-form-errors>
      <div class="top"></div>
      <div class="mb-3">
        <input type="email" name="email" placeholder="Email" required class="form-control border-0 shadow-sm"/> 
      </div>

      <div class="mb-3">
        <input type="password" name="password" placeholder="Password" required class="form-control border-0 shadow-sm"/> 
      </div>
    
      <div class="d-flex justify-content-between align-items-center mb-4"> 
          <div class="form-check mb-3">
            <input type="checkbox" name="remember" id="remember" class="form-check-input">
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>
        <a href="#" class="text-decoration-none">Forgot Password?</a>
      </div>

      <button type="submit" class="btn btn-primary w-100 py-2">Login</button> 
      
    </form> 
</div>

</body>