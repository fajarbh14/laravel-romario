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
            <strong>Berhasil!</strong> register.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @elseif(Session::has('failed'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal!</strong> register.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif


        <div class="form-regis">
          <h3>Register</h3>
          <form action="{{ route('postRegister') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="">Fullname</label>
              <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" placeholder="Fullname">
              {!!$errors->first("fullname", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="tes@gmail.com">
              {!!$errors->first("email", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
              <label for="">Date Of Birth</label>
              <input type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}">
              {!!$errors->first("date_of_birth", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
              <label for="">Gender</label>
              <select name="gender" class="form-control">
                <option disabled selected> -- select an option -- </option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              {!!$errors->first("gender", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
              <label for="">Blood Type</label>
              <select name="blood_type" class="form-control">
                <option disabled selected> -- select an option -- </option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="ab">AB</option>
                <option value="o">O</option>
              </select>
              {!!$errors->first("blood_type", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
              {!!$errors->first("password", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
              <label>Konf Password</label>
              <input type="password" class="form-control" name="konf_password" placeholder="Konfirmasi Password">
              {!!$errors->first("konf_password", "<span class='text-danger'>:message</span>")!!}
            </div>
            <div class="form-group">
              <label for="">Status</label>
              <select name="status" class="form-control">
                <option disabled selected> -- select an option -- </option>
                <option value="0">Not Active</option>
                <option value="1">Active</option>
              </select>
            </div>
            <button class="w-100 btn btn-primary mt-2" type="submit">Daftar</button>
          </form>
          <p class="mt-2">Sudah punya akun? <a href="{{ route('login') }}" class="text-danger">Login disini!</a></p>
        </div>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>