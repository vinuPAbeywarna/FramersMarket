<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FarmersMarket</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
</head>


<body id="page-top">
<div id="wrapper">
    @include('SideBar.SideBar')
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                    <form class="user" method="post">
                        @csrf
                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </div>
                    </form>
                </div>
            </nav>
            <div class="container-fluid">

                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Graphs</p>
                    </div>
                    <div class="card-body">
                        <h3 class="text-dark mb-1">Types of Harvest</h3>
                        <div class="chart-area" style="width:512px">
                            <canvas  id="harvestChart"></canvas>
                        </div>

                        <h3 class="text-dark mb-1">Wastage (kg)</h3>
                        <div class="chart-area" style="width:512px">
                            <canvas id="wasteChart" ></canvas>
                        </div>

                        <h3 class="text-dark mb-1">Successful Transactions</h3>
                        <div class="chart-area" style="width:512px">
                            <canvas id="TransactionChart"></canvas>
                        </div>

                        <h3 class="text-dark mb-1"> Locations Most Farmers Reside</h3>
                        <div class="chart-area" style="width:512px">
                            <canvas id="LocationsChart"></canvas>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
@include('Common.Footer')

<script>
    let ctx = document.getElementById('harvestChart');
    let ctx2 = document.getElementById('wasteChart');
    let ctx3 = document.getElementById('LocationsChart');
    let ctx4 = document.getElementById('TransactionChart');
    let myChart = new Chart(ctx, {
        type: 'pie',
        maintainAspectRatio: false,
        data: {
            labels: ['Vegetables', 'Fruits', 'Nuts','Grain'],
            datasets: [{
                label: '# of Reports',
                data: [{{$HarvestGraph[0]}}, {{$HarvestGraph[1]}}, {{$HarvestGraph[2]}}, {{$HarvestGraph[3]}}],
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 206, 86, 1)',

                ],
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 2
            }]
        },
    });
    let myChart2 = new Chart(ctx2, {
        type: 'pie',
        maintainAspectRatio: false,
        data: {
            labels: ['Waste (kg)', 'Useful (kg)'],
            datasets: [{
                label: '# of Reports',
                data: [{{$Wastage[0]}}, {{$Wastage[1]}}],
                backgroundColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(50, 168, 82, 1)',

                ],
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 2
            }]
        },
    });

    let myChart3 = new Chart(ctx3, {
        type: 'bar',
        maintainAspectRatio: false,
        data: {
            labels: ['Hambanthota','Jaffna','Colombo','Ampara','Anuradhapura','Badulla','Batticaloa','Mannar','Gampaha','Galle','Kaluthara','Kandy','Kegalle','Kilinochchi','kurunegala','Matara','Matale','Monaragala','Mulathiv','Nuwara Eliya','Putthalama','Rathnapura','Trincomalee','Vavniya'],
            datasets: [{
                label: '# of Reports',
                data: [{{$Location[0]}},{{$Location[1]}},{{$Location[2]}},{{$Location[3]}},{{$Location[4]}},{{$Location[5]}},{{$Location[6]}},{{$Location[7]}},{{$Location[8]}},{{$Location[9]}},{{$Location[10]}},{{$Location[11]}},{{$Location[12]}},{{$Location[13]}},{{$Location[14]}},{{$Location[15]}},{{$Location[16]}},{{$Location[17]}},{{$Location[18]}},{{$Location[19]}},{{$Location[20]}},{{$Location[21]}},{{$Location[22]}},{{$Location[23]}}],
                backgroundColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(50, 168, 82, 1)',
                    'rgba(222, 140, 255, 1)',
                    'rgba(251, 70, 73, 1)',
                    'rgba(251, 239, 73, 0.26)',
                    'rgba(12, 239, 73, 0.26)',
                    'rgba(12, 4, 186, 0.26)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 60, 21, 0.26)',
                    'rgba(0, 255, 255, 0.26)',
                    'rgba(90, 255, 0, 0.26)',
                    'rgba(90, 255, 0, 0.82)',
                    'rgba(255, 255, 0, 0.82)',
                    'rgba(255, 70, 0, 0.7)',
                    'rgba(35, 155, 252, 0.52)',
                    'rgba(35, 231, 252, 1)',
                    'rgba(17, 72, 252, 1)',
                    'rgba(17, 72, 166, 0.34)',
                    'rgba(35, 231, 252, 1)',
                    'rgba(35, 231, 252, 1)',



                ],
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 2
            }]
        },
    });

    let myChart4 = new Chart(ctx4, {
        type: 'pie',
        maintainAspectRatio: false,
        data: {
            labels: ['Bought','Ignored'],
            datasets: [{
                label: '# of Reports',
                data: [{{$SaleStatus[0]}},{{$SaleStatus[1]}}],
                backgroundColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(50, 168, 82, 1)',
                    'rgba(222, 140, 255, 1)',
                    'rgba(251, 70, 73, 1)',
                ],
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 2
            }]
        },
    });






</script>
</body>

</html>
