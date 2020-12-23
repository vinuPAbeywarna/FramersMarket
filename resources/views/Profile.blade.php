<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - FarmersMarket</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/fonts/fontawesome5-overrides.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-carrot"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>FarmersMarket</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link active" href="resources/views/Profile.blade.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="submitreport.html"><i class="fas fa-table"></i><span>Submit Reports</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="SignIn.blade.php"><i class="fa fa-map"></i><span>View on Map</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="graphs.html"><i class="fa fa-pie-chart"></i><span>Graphs</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                    </div>
                </nav>
                <div class="container-fluid">
                    @php
                        $userType = \Illuminate\Support\Facades\Session::get('UserType');
                    @endphp
                    <h3 class="text-dark mb-4">Profile | {{$userType}}</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="/assets/img/dogs/defaultPP.png" width="160" height="160">
                                    <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Change Photo</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            @php
                                                $User = App\Models\UserModel::where('NIC','=',\Illuminate\Support\Facades\Session::get('NIC'))->get()->first();
                                            @endphp
                                            <form method="post">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="username"><strong>Full</strong>&nbsp;Name</label><input class="form-control" type="text" value="{{$User->Name}}" name="Name"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="email"><strong>NIC</strong></label><input class="form-control" type="text" value="{{$User->NIC}}" name="NIC"></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="first_name"><strong>Phone</strong></label><input class="form-control" type="text" value="{{$User->Phone}}" name="Phone"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="last_name"><strong>Email</strong><br></label><input class="form-control" type="text" value="{{$User->Email}}" name="Email"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="first_name"><strong>Address</strong></label><input class="form-control" type="text" value="{{$User->Address}}" name="Address"></div>
                                                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(\Illuminate\Support\Facades\Session::get('UserType') == 'Farmer')
                    <div class="card shadow mb-5">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Reports</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Report Name / Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Cell 1</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm" role="group"><button class="btn btn-primary" type="button">Edit</button><button class="btn btn-danger" type="button">Delete</button></div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <footer class="bg-white sticky-footer"></footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="/assets/js/script.min.js"></script>
</body>

</html>
