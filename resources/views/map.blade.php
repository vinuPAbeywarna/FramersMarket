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

    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9vA47OJhiGUHAMljNXKYS_tV0863vUcY&callback=initMap"
        defer
    ></script>

</head>

<body id="page-top">
    <div id="wrapper">
        @include('SideBar.SideBar')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid" style="padding: 0">
                    <div style="padding: 0;height: 100vh;width: 100%" id="map"></div>
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    @include('Common.Footer')
    <script>


        function initMap() {
            console.log('A');


            const map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 6.92, lng: 79.9 },
                zoom: 11,

            });
            @php
            $reports = \App\Models\ReportModel::all();
            @endphp
            @foreach($reports as $rp)

            const lt_{{$rp->id}} = { lat: {{$rp->Lat}}, lng: {{$rp->Lang}} };
            const cs_{{$rp->id}} =
                '<div style="width:512px" id="content">' +
                '<div id="siteNotice">' +
                "</div>" +
                '<h3 id="firstHeading" class="firstHeading">{{$rp->updated_at}} | {{$rp->HarvestType}}</h3>' +
                '<div id="bodyContent">' +

                '<div class="row">' +
                '<select class="form-control" name="UserType" required="">' +
                '<optgroup label="Select User Type">' +
                '<option value="KeelsStaff">KeelsStaff</option>' +
                '</optgroup>' +
                '</select>' +
                '' +
                '' +
                '<button class="btn btn-sm">Set</button>' +
                '</div>' +


                "<p>{{$rp->Description}}</p>" +
                "</div>" +
                "</div>";
            const iw_{{$rp->id}}  = new google.maps.InfoWindow({
                content: cs_{{$rp->id}},
            });
            const m_{{$rp->id}}  = new google.maps.Marker({
                position: lt_{{$rp->id}},
                map,
                title: "Vinu"
            });
            m_{{$rp->id}} .addListener("click", () => {
                iw_{{$rp->id}} .open(map, m_{{$rp->id}});
            });
            @endforeach
        }
    </script>
</body>

</html>
