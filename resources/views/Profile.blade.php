@include('Common.Header')

<body id="page-top">
<div id="wrapper">
    @include('SideBar.SideBar')
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid">
                    <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i
                            class="fas fa-bars"></i></button>
                    <form
                        class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                                        placeholder="Search for ...">
                            <div class="input-group-append">
                                <button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i>
                                </button>
                            </div>
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


                            <div class="card-body text-center shadow">
                                @php
                                $User = \App\Models\UserModel::where('NIC','=', \Illuminate\Support\Facades\Session::get('NIC'))->first();
                                @endphp

                                    <img class="rounded-circle mb-3 mt-4" src="/storage/{{$User->Photo}}" width="160"
                                         height="160">



                                <div class="mb-3">
                                    <form enctype="multipart/form-data" method="POST" action="/photoUpload">
                                        @csrf

                                        <div class="row no-gutters">
                                            <div class="col">
                                                <input type="file" class="form-control-file" name="Photo">
                                            </div>
                                            <div class="col">
                                                <input type="submit" class="btn btn-primary btn-sm" value="Change Photo">
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
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
                                        <form method="post" action="/updateUser">
                                            @csrf
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="username"><strong>Full</strong>&nbsp;Name</label><input
                                                            class="form-control" type="text" value="{{$User->Name}}"
                                                            name="Name"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label
                                                            for="email"><strong>NIC</strong></label><input
                                                            class="form-control" type="text" value="{{$User->NIC}}"
                                                            name="NIC"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label
                                                            for="first_name"><strong>Phone</strong></label><input
                                                            class="form-control" type="text" value="{{$User->Phone}}"
                                                            name="Phone"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label
                                                            for="last_name"><strong>Email</strong><br></label><input
                                                            class="form-control" type="text" value="{{$User->Email}}"
                                                            name="Email"></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label
                                                    for="first_name"><strong>Address</strong></label><input
                                                    class="form-control" type="text" value="{{$User->Address}}"
                                                    name="Address"></div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-sm" type="submit">Save Settings
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Session('UserType') == 'Farmer')
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
                                                <th>Report Type / Date</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $Reports = \App\Models\ReportModel::where('FarmerNIC','=', Session('NIC'))->get();
                                            @endphp
                                            @foreach($Reports as $Report)
                                                <tr>
                                                    <td>{{$Report->HarvestType}} | {{$Report->updated_at}}</td>
                                                    <td>

                                                        <div class="btn-group btn-group-sm" role="group">

                                                            <form method="get" action="/updatereport/{{$Report->id}}">
                                                                @csrf
                                                                <input hidden name="id" value="{{$Report->id}}| {{$Report->updated_at}}">
                                                                <input class="btn btn-primary" type="submit" value="Edit">
                                                            </form>

                                                            <form method="post" action="/deletereport">
                                                                @csrf
                                                                <input hidden name="id" value="{{$Report->id}}">
                                                            <input class="btn btn-danger" type="submit" value="Delete">
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
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

    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
@include('Common.Footer')
</body>

</html>
