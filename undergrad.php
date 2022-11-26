<<<<<<< HEAD
<!DOCTYPE html>
<html>
    <!--API Key = AIzaSyCJZaeyRugTZOdzWV9wTgVPrwLCUP7AXYg -->
    <head>
        <link rel="stylesheet" href="typhoon.css">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <title>Typhoon</title>
    </head>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {
        'packages': ['map'],
        'mapsApiKey': 'AIzaSyCJZaeyRugTZOdzWV9wTgVPrwLCUP7AXYg'
      });
      google.charts.setOnLoadCallback(drawMap);
  
      function drawMap () {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Address');
        data.addColumn('string', 'Location');
        data.addColumn('string', 'Marker')
  
        data.addRows([
          ['202 S Park St, Madison, WI 53715, United States',                  'Meriter Hospital',   'blue'],
          ['801 Braxton Place, Madison, WI 53715, United States',   'Select Specialty Hospital',   'blue'],
          ['700 S Brooks St, Madison, WI 53715, United States',     'SSM St. Marys',   'blue'],
          ['600 Highland Ave, Madison, WI 53792, United States',     'UW Hospital',   'blue'],
          ['2500 Overlook Terrace, Madison, WI 53705, United States',     'William S Middleton Memorial Veterans Hospital',   'blue']
        ]);
        
        var url = 'https://icons.iconarchive.com/icons/icons-land/vista-map-markers/48/';
        var options = {
          mapType: 'styledMap',
          zoomLevel: 12,
          showTooltip: true,
          showInfoWindow: true,
          useMapTypeControl: true,
          icons: {
          blue: {
            normal:   url + 'Map-Marker-Ball-Azure-icon.png',
          },
          pink: {
            normal:   url + 'Map-Marker-Ball-Pink-icon.png',
          }
        },
          maps: {
            styledMap: {
              name: 'City Map',
              styles: [
                {featureType: 'poi.attraction',
                 stylers: [{color: '#fce8b2'}]
                },
                {featureType: 'road.highway',
                 stylers: [{hue: '#0277bd'}, {saturation: -50}]
                },
                {featureType: 'road.highway',
                 elementType: 'labels.icon',
                 stylers: [{hue: '#000'}, {saturation: 100}, {lightness: 50}]
                },
                {featureType: 'landscape',
                 stylers: [{hue: '#259b24'}, {saturation: 10}, {lightness: -22}]
                }
          ]}}
        };
  
        var map = new google.visualization.Map(document.getElementById('map_div'));
  
        map.draw(data, options);
      }
    </script>

    <body>

        <div id="logo">
            <h1><a href="index.php" style="text-decoration: none;">Typhoon</a></h1>
            
        </div>

        <div class="navbar">
            <a href="index.html">Home</a>
            <a href="requirements.html">Requirements</a>
            <div class="dropdown">
              <button class="dropbtn">Sites 
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="undergrad.html">Undergraduate</a>
                <a href="grad.html">Graduate</a>
              </div>
            </div>
            <a href="admin.html">Admin</a> 
          </div>
          <br><br>
        <div class="grid-container">
          <div class="resources">
            <h4>Helpful Resources</h4>
          </div>
          <div class="wellness">
            <a href="https://www.edgewood.edu/wellness"><img src="ECthumb.png" alt="Wellness Center"></a><br>
            <a href="https://www.edgewood.edu/wellness">Wellness Center</a>                
          </div>
          <div class="viewpoint">
            <a href="https://www.viewpointscreening.com/edgewood"><img src="VPthumb.png" alt="ViewPoint logo"></a><br>
            <a href="https://www.viewpointscreening.com/edgewood">ViewPoint Screening</a>                  
          </div>
          <div class="ches">
            <a href="https://www.cheswi.org/"><img src="chesthumb.png" alt="CHES logo"></a><br>
            <a href="https://www.cheswi.org/">CHES</a>  
          </div>
          <div class="myce">
            <a href="https://register.myclinicalexchange.com/MainPage.aspx?ReturnUrl=%2f"><img src="MyCEthumb.png" alt="MyClinicalExchange logo"></a><br>
            <a href="https://register.myclinicalexchange.com/MainPage.aspx?ReturnUrl=%2f">MyClinicalExchange</a> 
          </div>

          <div id="ugHospitals">
            <details>
              <summary id="Meriter">Meriter Hospital</summary>
                <h4>Unique Requirements:</h4>
                <a href="https://register.myclinicalexchange.com/MainPage.aspx?ReturnUrl=%2f">MyClinicalExchange</a>
                <br>
            </details>

            <details>
              <summary id="Select">Select Specialty Hospital</summary>
              <h4>Unique Requirements:</h4>
              <p>10-Panel Drug Screen</p>
              <br>  
            </details>
            
            <details>
              <summary id="SSM">St Mary's Hospital</summary>
              <h4>Unique Requirements:</h4>
              <a href="https://register.myclinicalexchange.com/MainPage.aspx?ReturnUrl=%2f">MyClinicalExchange</a>
              <br>
            </details>
            
            <details>
              <summary id="UW">UW & American Family Children's Hospital</summary>
              <h4>Unique Requirements:</h4>
              <a href="https://register.myclinicalexchange.com/MainPage.aspx?ReturnUrl=%2f">MyClinicalExchange</a>
              <br>  
            </details>
            
            <details>
              <summary id="VA">William S Middleton Memorial Veteran's Hospital</summary>
              <h4>Unique Requirements:</h4>
              <p>Annual Physical</p>
              <p>TB test 90 days before start date</p>
              <br>
            </details> 
          </div>
        </div>

        <div id="map_div"></div>


        </script>

    </body>
</html>