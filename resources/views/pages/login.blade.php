<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Pondok Mawar | Login</title>
</head>
<body class="text-center">
     <div class="container d-flex justify-content-center align-items-center min-vh-100 col-lg-3">
       <div class=" rounded-5 p-3 bg-white box-area">        
        <div class="row">
            <div class="col-12">
                {{-- @if (session()->has('sukses'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('sukses') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    
                    @if (session()->has('loginerror'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif --}}
                <div id="loginError" class="alert alert-danger" style="display: none;"></div>
            </div>
        </div>
       <div class="col-md-12">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Login</h2>
                     {{-- <p>We are happy to have you back.</p> --}}
                </div>
            <form id="loginForm" {{--action="{{ url('/api/login') }}" method="post" --}}>
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email address" id="email" name="email" required>
                </div>
                <div class="input-group mb-1">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" id="password" name="password" required>
                </div>
                <div class="input-group mb-5 d-flex justify-content-between">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="formCheck">
                        <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                    </div>
                    <div class="forgot">
                        <small><a href="#">Forgot Password?</a></small>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-primary w-100 fs-6" onclick="login()">Login</button>
                </div>
            </form>
                <div class="row">
                    <small>Don't have account? <a href="{{ url('/register') }}">Register</a></small>
                </div>
          </div>
       </div> 

      </div>
    </div>

    <script>
        const form = document.getElementById('loginForm');
    const errorDiv = document.getElementById('loginError');

    function login(event) {
        event.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                email: email,
                password: password,
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const token = data.token;
                window.location.href = '/product';
            } else {
                // Tampilkan pesan kesalahan di dalam elemen <div>
                errorDiv.style.display = 'block';
                errorDiv.innerText = data.error;
            }
        })
        .catch(error => {
            console.error('Login error:', error.message);
        });
    }

    form.addEventListener('submit', login);
    </script>

</body>
</html>