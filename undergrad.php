<!DOCTYPE html>
<?php
    include("typhoonconfig.php");
    session_start();
    $sql = "SELECT * FROM site WHERE level = 'u' or level = 'b'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $name = $row["name"];
    $level = $row["level"];
    $street = $row["street"];
    $city = $row["city"];
    $zip = $row["zip"];
    $myce = $row["myce"];
    $tb90day = $row["90daytb"];
    $tb2step = $row["2steptb"];
    $drugscreen = $row["drugscreen"];
    $req = $row["uniquereq"];


?>
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
          while($row = $result->fetch_assoc()){
          <?php
          echo "['" . $street . "," . $city . "," . $state . $zip . ", United States" . "', '" . $name . "', 'blue'],"
          ?>
          }
          ['202 S Park St, Madison, WI 53715, United States',                  'Meriter Hospital',   'blue'],
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
            <a href="index.php">Home</a>
            <a href="requirements.php">Requirements</a>
            <div class="dropdown">
              <button class="dropbtn">Sites 
                <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                <a href="undergrad.php">Undergraduate</a>
                <a href="grad.php">Graduate</a>
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
            <?php
                //display the sql result set in an html table
                $table = $conn->query($sql);

                if ($table->num_rows > 0) {
                  //output each result row
                  while($row = $result->fetch_assoc()){
                    echo "<details>";
                    echo "<summary>" . $row['name'] . "</summary>";
                    echo "<h4>Unique Requirements:</h4>";
                    if($row['myce'] == 0 && $row['90daytb'] == 0 && ['2steptb'] == 0 && $row['drugscreen'] == 0 && $row['uniquereq'] == ''){
                        echo "No unique Requirements.";
                      }
                    if($row['myce'] == 1){
                      echo "<a href='https://register.myclinicalexchange.com/MainPage.aspx?ReturnUrl=%2f'>MyClinicalExchange</a><br>";
                    }
                    if($row['90daytb'] == 1){
                      echo "<p>TB test 90 days before start date</p><br>";
                    }
                    if($row['2steptb'] == 1){
                      echo "<p>A 2-step TB test is required</p><br>";
                    }
                    if($row['drugscreen'] == 1){
                      echo "<p>A 10-Panel Drug Screen is required</p><br>";
                    }
                    echo $row['uniquereq'] . "<br>";
                    echo "</details>";
                    
                  }//end of while
                }//end of if
            ?> 
          </div>
        </div>

        <div id="map_div"></div>


        </script>

    </body>
</html>