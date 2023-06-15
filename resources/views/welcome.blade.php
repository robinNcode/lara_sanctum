<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body, html {
            height: 100%;
        }

        .bg-image {
            /* The image used */
            background-image: url("{{ asset('img/abstract-square.jpg') }}");

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .bg-image::before {
            /* Add the blur effect */
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: inherit;
            filter: blur(2px);
            -webkit-filter: blur(2px);
        }

        .container {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 90%;
        }
    </style>

</head>
<body>
<!-- Login Form  with transparent card -->
<div class="bg-image">
    <div class="container">
        <div class="card bg-transparent shadow">
            <div class="card-body">
                <form method="POST" action="{{ route('signin') }}">
                    @csrf
                    <!-- Page Heading -->
                    <div class="row border-bottom">
                        <div class="col-md-12">
                            <h3 class="text-center">Welcome Back!</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ asset('img/auth/signin.png') }}" style="width: 100%" class="img-fluid">
                        </div>
                        <div class="col-md-7 pt-5">
                            <!-- Email -->
                            <div class="row form-group pt-5">
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <input id="emailID" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" placeholder="Username/Email Address" required
                                               autocomplete="email" autofocus>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="row form-group">
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <input id="passwordID" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" placeholder="Password" required
                                               autocomplete="current-password">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Forgot Password -->
                            <div class="row form-group">
                                <div class="col-md-10">
                                    <a href="#" class="text-decoration-none">Forgot Password?</a>
                                </div>
                            </div>

                            <!-- Sign In Button -->
                            <div class="row form-group">
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-secondary btn-block">Sign In</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery And Popper JS CDN -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- Bootstrap JS CDN -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
