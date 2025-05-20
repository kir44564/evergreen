<head>
    <style>
        .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 768px) {
        .gradient-form {height: 100vh !important;}
        }
        
        @media (min-width: 769px) {
        .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;}
        }

    </style>
</head>

<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Hello</h4>
                </div>

                <form method="POST" action="{{ route('login.attempt') }}">
                    @csrf
                    <x-form-errors></x-form-errors>
                  <p>Please login to your account</p>


                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example11" class="form-control"
                      placeholder="Email" />
                    <label class="form-label" for="form2Example11">Email</label>
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example22" class="form-control" placeholder="Password" />
                    <label class="form-label" for="form2Example22">Password</label>
                  </div>

                  <button data-mdb-button-init data-mdb-ripple-init 
                      class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 active" 
                      type="button" data-mdb-button-initialized="true" 
                      style aria-pressed="true">Log in</button>

                  <label class="form-check-label" for="remember">
                    <div class="form-check mb-3">
                    <input type="checkbox" name="remember" class="form-check-input">Remember Me
                    </div>
                  </label>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Don't have an account?</p>
                    <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger">Create new</button>
                  </div>

                  <button type="submit" class="btn btn-primary w-100">Submit</button>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <p class="small mb-0">Mele e pere</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>