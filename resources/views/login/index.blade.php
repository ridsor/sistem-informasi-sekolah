<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @include('layouts.favicon')

    <!-- My CSS -->
    <link rel="stylesheet" href="/css/login.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />

    <title>Login &middot; RPL</title>
  </head>
  <body>
    <main>
      <section>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 container-image d-none d-md-block">
              <div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="4000">
                    <img src="/img/Scene - 1.svg" class="d-block w-100" alt="" />
                  </div>
                  <div class="carousel-item" data-bs-interval="4000">
                    <img src="/img/Scene - 2.svg" class="d-block w-100" alt="" />
                  </div>
                  <div class="carousel-item" data-bs-interval="4000">
                    <img src="/img/Scene - 3.svg" class="d-block w-100" alt="" />
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 text-center fs-14 container-form d-flex align-items-center justify-content-center">
              <form action="/login" method="post" class="form">
                @csrf
                <img src="/img/logo-rpl.png" alt="" width="50" height="50" />
                <h2 class="mt-2">Halo, Teman!</h2>
                <p class="text-muted mb-5">Hanya admin yang dapat login ya...<br>Masukan email & password untuk login</p>
                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="form-floating mb-3">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}"/>
                  <label for="floatingInput">Email address</label>
                  @error('email')
                  <div class="invalid-feedback text-start">
                     {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="form-floating mb-1">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="floatingPassword" placeholder="Password" />
                  <label for="floatingPassword">Password</label>
                  @error('password')
                  <div class="invalid-feedback text-start">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="checkbox mb-4 d-flex">
                  <label> <input type="checkbox" name="remember_me"/> Remember Me </label>
                </div>
                <hr class="featurette-divider" />
                <button class="w-100 btn btn-lg btn-primary fs-6" type="submit">Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
