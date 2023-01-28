<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="row justify-content-center mt-5">
      <div class="col-lg-6">

        @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> Login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @elseif(Session::has('failed'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> Login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @elseif(Session::has('warning'))
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Anda!</strong> telah logout.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @elseif(Session::has('alert'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oops!</strong> anda belum login, silahkan login terlebih dahulu.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="form-login">
          <h3>Login</h3>
          <form action="{{ route('postLogin') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="tes@gmail.com" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <button class="w-100 btn btn-primary mt-2" type="submit">Login</button>
          </form>
          <p class="mt-2">Belum punya akun? <a href="{{ route('register') }}" class="text-danger">Daftar disini!</a></p>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>