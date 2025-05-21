<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');
    *,*:before,*:after{box-sizing:border-box}

    body, html {
      height: 100%;
      margin: 0;
      padding: 0;
      font-family: 'Raleway', sans-serif;
      background: #f8fafc;
    }
    .container-anim {
      position: absolute;
      width: 100vw;
      height: 100vh;
      overflow: hidden;
    }
    .top, .bottom {
      position: absolute;
      width: 100%;
      height: 100%;
      left: 0; top: 0;
      pointer-events: none;
    }
    .top:before, .top:after, .bottom:before, .bottom:after {
      content: '';
      display: block;
      position: absolute;
      width: 200vmax;
      height: 200vmax;
      top: 50%; left: 50%;
      margin-top: -100vmax;
      margin-left: -100vmax;
      transform-origin: 0 50%;
      transition: all 0.7s cubic-bezier(0.445, 0.05, 0, 1);
      z-index: 10;
      opacity: 0.65;
      transition-delay: 0.2s;
    }
    .top:before   { transform: rotate(45deg)   translateX(0); background: #e46569; }
    .top:after    { transform: rotate(135deg)  translateX(0); background: #ecaf81; }
    .bottom:before{ transform: rotate(-45deg)  translateX(0); background: #60b8d4; }
    .bottom:after { transform: rotate(-135deg) translateX(0); background: #3745b5; }

    .container-anim:hover .top:before,
    .container-anim:active .top:before   { transform: rotate(45deg)   translateX(-120vw); transition-delay: 0s; }
    .container-anim:hover .top:after,
    .container-anim:active .top:after    { transform: rotate(135deg)  translateX(120vw);  transition-delay: 0s; }
    .container-anim:hover .bottom:before,
    .container-anim:active .bottom:before{ transform: rotate(-45deg)  translateX(-120vw); transition-delay: 0s; }
    .container-anim:hover .bottom:after,
    .container-anim:active .bottom:after { transform: rotate(-135deg) translateX(120vw);  transition-delay: 0s; }

    .center-anim {
      position: absolute;
      width: 100%;
      max-width: 400px;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.08);
      padding: 2rem 1.5rem;
      opacity: 0;
      transition: opacity 0.5s cubic-bezier(0.445, 0.05, 0, 1);
      transition-delay: 0s;
      z-index: 20;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .container-anim:hover .center-anim,
    .container-anim:active .center-anim {
      opacity: 1;
      transition-delay: 0.2s;
    }
    @media (max-width: 500px) {
      .center-anim {
        max-width: 95vw;
        padding: 1rem 0.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="container-anim">
    <div class="top"></div>
    <div class="bottom"></div>
    <div class="center-anim">
      <h2 class="mb-4 text-center">Register</h2>
      <form method="POST" action="{{ route('register.store') }}" class="w-100">
        @csrf
        <x-form-errors></x-form-errors>
        <div class="mb-3">
          <input type="text" name="name" placeholder="Name" required class="form-control border-0 shadow-sm"/>
        </div>
        <div class="mb-3">
          <input type="email" name="email" placeholder="Email" required class="form-control border-0 shadow-sm"/>
        </div>
        <div class="mb-3">
          <input type="password" name="password" placeholder="Password" required class="form-control border-0 shadow-sm"/>
        </div>
        <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
      </form>
    </div>
  </div>
</body>
</html>