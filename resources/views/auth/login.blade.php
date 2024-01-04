<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="hello.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="public/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.css" rel="stylesheet">
    <style>
        .background {
            background-color: #4e73df26;
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the image horizontally and vertically */
            background-repeat: no-repeat;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%; /* Full viewport width */
            height: 100%; /* Full viewport height */
        }


        /* Define styles for the container div */
        .img-container {
            width: 100%;
            /* Set the width of the container */
            height: 100px;
            /* Set the height of the container */
            /* border: 1px solid #ccc; Add a border for visualization */
            display: flex;
            /* Use flexbox to center content vertically and horizontally */
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
        }

        /* Style for the image */
        .centered-image {
            max-width: 60%;
            /* Ensure the image doesn't exceed the container's width */
            max-height: 100%;
            /* Ensure the image doesn't exceed the container's height */
        }
    </style>
</head>

<body class="background">

    <div class="container bg-cover">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9 mt-9 ">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="img-container">
                                        <img class="centered-image" src="/img/sonatrach.svg" alt="logo sonatrach"
                                            width="">
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenue!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" {{ __('Email Address') }}
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                                id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="password" {{ __('Password') }}
                                                class="form-control form-control-user form-control @error('password') is-invalid @enderror"
                                                id="exampleInputPassword" placeholder="Password" name="password"
                                                required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror


                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck"
                                                    {{ old('customCheck') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customCheck"
                                                    {{ __('Remember Me') }}>Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>


                                            {{-- @if (Route::has('password.request'))
                                                <a class="btn btn-link small" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif --}}


                                        </div>



                                    </form>


                                    {{-- <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> --}}


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/js/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

</body>

</html>
