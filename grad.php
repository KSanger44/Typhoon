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

    <?php
        include("typhoonconfig.php");
        session_start();
        $sql = "SELECT * FROM site WHERE level = 'g' or level = 'b'";
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


        //display the sql result set in an html table
        $table = $conn->query($sql);

        if ($table->num_rows > 0) {
            //output each result row
            while($row = $result->fetch_assoc()){
            echo "<details>";
            echo "<summary>" . $row['name'] . "</summary>";
            echo "<h4>Unique Requirements:</h4>";
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
        else{
            
            echo "<p>No results found.</p>";
        }
    
        $conn->close();
    ?>      
    </body>
</html>