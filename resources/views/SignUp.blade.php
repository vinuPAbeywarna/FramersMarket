@include('Common.Header')

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
    @include('Common.Footer')
</body>

</html>
