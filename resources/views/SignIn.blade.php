<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - FarmersMarket</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">

                                        @if($error)
                                        <div role="alert" class="alert alert-danger"><span><strong>Invalid NIC/Password. Please Retry</strong></span></div>
                                        @endif
                                        <h4 class="text-dark mb-4">WELCOME TO FARMERSMARKET</h4>
                                    </div>
                                    <form class="user" method="post">
                                        @csrf
                                        <div class="form-group"><input class="form-control form-control-user" type="text" id="exampleInputEmail-1" aria-describedby="emailHelp" placeholder="Enter NIC..." name="NIC" required=""></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword-1" placeholder="Password..." name="Password" required=""></div><button class="btn btn-primary btn-block text-white btn-user" type="submit">SignIn</button>
                                        <hr><a href="/signup"><button class="btn btn-danger btn-block text-white btn-user" type="button">SignUp</button><a/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="/assets/js/script.min.js"></script>

</body>

</html>
