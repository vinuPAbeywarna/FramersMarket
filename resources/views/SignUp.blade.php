<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - FarmersMarket</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="card shadow-lg o-hidden border-0 my-5">
            <div class="card-body p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h4 class="text-dark mb-4">Create an Account!</h4>
                            </div>
                            <form class="user" method="post">
                                @csrf
                                <div class="form-group"><input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Full Name" name="Name" required=""></div>
                                <div class="form-group"><input class="form-control form-control-user" type="text" id="exampleInputEmail-3" aria-describedby="emailHelp" placeholder="NIC" name="NIC" required=""></div>
                                <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputEmail-4" aria-describedby="emailHelp" placeholder="Password" name="Password" required=""></div>
                                <div class="form-group"><input class="form-control form-control-user" type="email" id="exampleInputEmail-2" aria-describedby="emailHelp" placeholder="Email Address" name="Email"></div>
                                <div class="form-group"><input class="form-control form-control-user" type="number" id="exampleInputEmail-1" aria-describedby="emailHelp" placeholder="Phone" name="Phone" required=""></div>
                                <div class="form-group"><input class="form-control form-control-user" type="text" id="exampleInputEmail-5" aria-describedby="emailHelp" placeholder="Address" name="Address" required=""></div><button class="btn btn-primary btn-block text-white btn-user" type="submit">SignUp</button>
                            </form>
                            <div class="text-center"><a class="small" href="/signin">Already have an account? Login!</a></div>
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
