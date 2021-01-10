<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>FarmersMarket</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome5-overrides.min.css">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9vA47OJhiGUHAMljNXKYS_tV0863vUcY"></script>
    <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
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
                        <p class="text-primary m-0 font-weight-bold">Submit Report</p>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/updatereportsave">
                            @csrf
                            <div class="form-group"><select class="form-control" name="HarvestType" required="">
                                    <optgroup label="Select Harvest Type">
                                        <option @if($Report->HarvestType == 'Vegetables') selected @endif value="Vegetables">Vegetables</option>
                                        <option @if($Report->HarvestType == 'Fruits') selected @endif value="Fruits">Fruits</option>
                                        <option @if($Report->HarvestType == 'Nuts') selected @endif value="Nuts">Nuts</option>
                                        <option @if($Report->HarvestType == 'Grain') selected @endif value="Grain">Grain</option>
                                    </optgroup>
                                </select></div>
                            <div class="form-group"><input class="form-control" value="{{$Report->Amount}}" min="1" step="any" type="number" name="Amount" required="" inputmode="numeric" placeholder="Total Amount (kg)"></div>
                            <div class="form-group"><input class="form-control" value="{{$Report->WAmount}}" min="0" step="any" type="number" name="WAmount" required="" inputmode="numeric" placeholder="Wastage Amount (kg)"></div>
                            <div class="form-group"><label>Location</label>
                                <div style="height: 256px; width: 100%" id="map"></div>
                            </div>
                            <div class="form-group"><label>Selected Location</label>
                                <label>
                                    Lat :<input value="{{$Report->Lat}}" name="Lat" type="number" step="any" class="form-control" id="maplat">
                                </label>
                                <label>
                                    Lang : <input value="{{$Report->Lang}}" name="Lang" type="number" step="any" class="form-control" id="maplang">
                                </label>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="District" required="">
                                    <optgroup label="Select Your District">
                                        <option @if($Report->District=='Ampara') selected @endif value="Ampara">Ampara</option>
                                        <option @if($Report->District=='Anuradhapura') selected @endif value="Anuradhapura">Anuradhapura</option>
                                        <option @if($Report->District=='Badulla') selected @endif value="Badulla">Badulla</option>
                                        <option @if($Report->District=='Batticaloa') selected @endif value="Batticaloa">Batticaloa</option>
                                        <option @if($Report->District=='Mannar') selected @endif value="Mannar">Batticaloa</option>

                                        <option @if($Report->District=='Colombo') selected @endif value="Colombo">Colombo</option>
                                        <option @if($Report->District=='Galle') selected @endif value="Galle">Galle</option>
                                        <option @if($Report->District=='Gampaha') selected @endif value="Gampaha">Gampaha</option>
                                        <option @if($Report->District=='Hambanthota') selected @endif value="Hambanthota">Hambanthota</option>
                                        <option @if($Report->District=='Jaffna') selected @endif value="Jaffna">Jaffna</option>

                                        <option @if($Report->District=='Kaluthara') selected @endif value="Kaluthara">Kaluthara</option>
                                        <option @if($Report->District=='Kandy') selected @endif value="Kandy">Kandy</option>
                                        <option @if($Report->District=='Kegalle') selected @endif value="Kegalle">Kegalle</option>
                                        <option @if($Report->District=='Kilinochchi') selected @endif value="Kilinochchi">Kilinochchi</option>
                                        <option @if($Report->District=='kurunegala') selected @endif value="kurunegala">kurunegala</option>

                                        <option @if($Report->District=='kurunegala') selected @endif value="Matara">Matara</option>
                                        <option value="Matale">Matale</option>
                                        <option value="Monaragala">Monaragala</option>
                                        <option value="Mulathiv">Mulathiv</option>
                                        <option value="Nuwara Eliya">Nuwara Eliya</option>

                                        <option value="Putthalama">Putthalama</option>
                                        <option value="Rathnapura">Rathnapura</option>
                                        <option value="Trincomalee">Trincomalee</option>
                                        <option value="Vavniya">Vavniya</option>
                                        <option value="Matale">Matale</option>
                                    </optgroup>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleForControlfile1">Select Product Image</label>
                                <input type="file" name="PImage" class="form-control" id="exampleForControlfile1">
                            </div>

                            <div class="form-group"><textarea value="{{$Report->Description}}" class="form-control" name="Description" placeholder="Description" required=""></textarea></div>
                            <button class="btn btn-primary btn-block btn-lg" type="submit">Save Report</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="../../assets/js/script.min.js"></script>
<script>
    // Get element references
    //let confirmBtn = document.getElementById('confirmPosition');
    //let onClickPositionView = document.getElementById('onClickPositionView');
    let locLat = document.getElementById('maplat');
    let locLang = document.getElementById('maplang');

    // Initialize locationPicker plugin
    let lp = new locationPicker('map', {
        setCurrentPosition: true,
    }, {
        zoom: 11
    });




    // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
    google.maps.event.addListener(lp.map, 'idle', function (event) {
        // Get current location and show it in HTML
        let location = lp.getMarkerPosition();
        console.log(lp);
        locLat.value = location.lat;
        locLang.value = location.lng;
    });

    //confirmBtn.onclick = function () {
    // Get current location and show it in HTML
    // let location = lp.getMarkerPosition();
    // onClickPositionView.innerHTML = 'The chosen location is ' + location.lat + ',' + location.lng;
    // };
</script>
</body>

</html>

