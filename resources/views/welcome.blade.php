<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Engineer Gang :: Your Daily Meal Assistant!!</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('/') }}assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                @auth
                                    <a href="{{route('dashboard')}}"><h4 class="text-center">Go To Dashboard!! <i class="ti ti-arrow-narrow-right"></i></h4></a>
                                @else
                                    <a href="" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                        <img src="{{ asset('/') }}assets/images/logos/logo.png" width="180"
                                            alt="">
                                    </a>
                                    <p class="text-center">Your Meal Managemnet Helper!!</p>
                                    <form action="{{route('login')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Username</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                                @error('email')
                                                    <p class="text-danger">{{ $message }}</p>   
                                                @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="exampleInputPassword1">
                                            @error('password')
                                                    <p class="text-danger">{{ $message }}</p>   
                                            @enderror
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input primary" type="checkbox" value=""
                                                    id="flexCheckChecked" checked>
                                                <label class="form-check-label text-dark" for="flexCheckChecked">
                                                    Remeber this Device
                                                </label>
                                            </div>
                                            
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign
                                            In</button>
                                        
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('/') }}assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('/') }}assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
