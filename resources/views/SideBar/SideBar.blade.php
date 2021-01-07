<nav class="navbar navbar-dark align-items-start sidebar toggled sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-carrot"></i></div>
            <div class="sidebar-brand-text mx-3"><span>FarmersMarket</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light" id="accordionSidebar">

            @if(Session('Logged'))
            <li class="nav-item"><a class="nav-link" href="/profile"><i class="fas fa-user"></i><span>Profile</span></a></li>
            @endif
            @if(Session('UserType')=='Admin')
                <li class="nav-item"><a class="nav-link" href="/addnewuser"><i class="fas fa-user"></i><span>New User</span></a></li>
            @endif
            @if(Session('UserType')=='Farmer')
            <li class="nav-item"><a class="nav-link" href="/submitreport"><i class="fas fa-table"></i><span>Submit Reports</span></a></li>
            @endif
            <li class="nav-item"><a class="nav-link" href="/map"><i class="fa fa-map"></i><span>View on Map</span></a></li>
            <li class="nav-item"><a class="nav-link" href="/graphs"><i class="fa fa-pie-chart"></i><span>Graphs</span></a></li>

        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
        <div>
            @if(Session('Logged'))
            <a href="/logout"><button class="btn btn-danger">SignOut</button></a>
            @else
            <a href="/signin"><button class="btn btn-danger">Signin</button></a>
            @endif
        </div>
    </div>
</nav>
