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

                <h3 class="text-dark mb-4">Add New User</h3>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-3">
                                    <div class="card-body">

                                        <form method="post">
                                            @csrf
                                            <div class="form-row">
                                                <label>User Type</label>
                                                <select class="form-control" name="UserType" required="">
                                                    <optgroup label="Select User Type">
                                                        <option value="KeelsStaff">KeelsStaff</option>
                                                        <option value="DOA">DOA</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Farmer">Farmer</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label for="username"><strong>Full</strong>&nbsp;Name</label><input
                                                            class="form-control" type="text"
                                                            name="Name"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label
                                                            for="email"><strong>NIC</strong></label><input
                                                            class="form-control" type="text"
                                                            name="NIC"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">

                                                <div class="col">
                                                    <div class="form-group"><label
                                                            for="password"><strong>Password</strong></label><input
                                                            class="form-control" type="password"
                                                            name="Password"></div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col">
                                                    <div class="form-group"><label
                                                            for="first_name"><strong>Phone</strong></label><input
                                                            class="form-control" type="text"
                                                            name="Phone"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label
                                                            for="last_name"><strong>Email</strong><br></label><input
                                                            class="form-control" type="text"
                                                            name="Email"></div>
                                                </div>
                                            </div>
                                            <div class="form-group"><label
                                                    for="first_name"><strong>Address</strong></label><input
                                                    class="form-control" type="text"
                                                    name="Address"></div>
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-sm" type="submit">Save
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
@include('Common.Footer')
</body>

</html>
