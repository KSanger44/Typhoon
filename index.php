<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="typhoon.css">
        <title>Typhoon</title>
    </head>
    <body>

        <div id="logo">
            <h1><a href="index.php" style="text-decoration: none;">Typhoon</a></h1>
            
        </div>

        <div class="navbar">
          <a href="index.php">Home</a>
          <a href="requirements.php">Requirements</a>
          <div class="dropdown">
            <button class="dropbtn">Sites</button>
            <div class="dropdown-content">
              <a href="undergrad.php">Undergraduate</a>
              <a href="grad.php">Graduate</a>
            </div>
          </div>
          <a href="admin.html">Admin</a> 
        </div>

          <h3>Welcome to Typhoon!</h3> 
            <p>Below you will see general announcements and a timeline of upcoming deadlines. Please use the navigation bar above to locate information about sites and requirements.</p>

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
                <div class="announcements">
                    <div class="aheader">
                      <h3>Announcements</h3>
                      <button onclick="darkMode()">Dark mode</button>
                      <button onclick="lightMode()">Light mode</button>
                    </div>
                    <?php
                      include("typhoonconfig.php");
                      session_start();
                      $sql = "SELECT * FROM announcement ORDER BY date DESC LIMIT 5";
                      $result = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                      $title = $row["title"];
                      $info = $row["info"];
                      $date = $row["date"];

                      $result = $conn->query($sql);
           
                      while($row = $result->fetch_assoc()){
                              echo "<h4>" .  $row['title'] . "</h4>";
                              echo "<p>" .  $row['info'] . "</p><br><br>";
                      } //end of while
                  
                      ?>
                </div>              
          </div>

    </body>
    <script>
            function darkMode() {
            document.getElementsByClassName('announcements').style.backgroundColor = "black";
            document.getElementsByClassName('announcements').style.color = "white"
            element.classList.toggle("darkmode");
            }

            function lightkMode() {
            document.getElementsByClassName('announcements').style.backgroundColor = "aliceblue";
            document.getElementsByClassName('announcements').style.color = "black"
            element.classList.toggle("darkmode");
            }
        </script>
</html>