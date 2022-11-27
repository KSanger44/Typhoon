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
            
                echo "<table>";
                echo "<tr>";
                    echo "<th>Site Name</th>";
                    echo "<th>MyCE</th>";
                    echo "<th>2-Step TB</th>";
                    echo "<th>DrugScreen</th>";
                    echo "<th>90 Day TB</th>";
                echo "</tr>";
    
                while($row = $result->fetch_assoc()){
                        echo "<tr>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['myce'] . "</td>";
                            echo "<td>" . $row['2steptb'] . "</td>";
                            echo "<td>" . $row['drugscreen'] . "</td>";
                            echo "<td>" . $row['90daytb'] . "</td>";
                            echo "<td>" . $row['uniquereq'] . "</td>";
                        echo "</tr>";   
                } //end of while
            
                echo"</table>";
            } // end of if
        else{
            
            echo "<p>No results found.</p>";
        }
    
        $conn->close();
    ?>      
    </body>
</html>