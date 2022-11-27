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

          <div id="addSite">
            <h3>Add Site</h3>
            <form action="" method="post">
              <label for="name">Site Name:</label><br>
              <input type="text" id="name" name="name"><br>

              <input type="checkbox" id="myce" name="myce" value="1">
              <label for="myce">MyClinicalExchange</label><br>
              <input type="checkbox" id="drugscreen" name="drugscreen" value="1">
              <label for="drugscreen">Drug Screen</label><br>
              <input type="checkbox" id="90daytb" name="90daytb" value="1">
              <label for="90daytb">90 Day TB</label><br>
              <input type="checkbox" id="2stepTB" name="2stepTB" value="1">
              <label for="2stepTB">2-Step TB</label><br>
              
              <label for="level">Level:</label>
              <select id="level" name="level">
                <option value="u">Undergraduate</option>
                <option value="g">Graduate</option>
                <option value="b">Both</option>
              </select><br>

              <label for="reqs">Unique Requirements:</label><br>
              <textarea id="reqs" name="reqs" rows="4" cols="50"></textarea><br>
              <label for="street">Address:</label>
              <input type="text" id="street" name="street"><br>
              <label for="city">City:</label>
              <input type="text" id="city" name="city"><br>
              <label for="state">State:</label>
              <input type="text" id="state" name="state"><br>
              <label for="zip">ZIP:</label>
              <input type="text" id="zip" name="zip"><br>
              <br>
              <input type="submit" id="submit" name="submit">
            </form>
          </div>
          <br><br>

          <div id="sitedelete">
          <form action="" method="get">
            <h3>Remove Sites</h3>
            <label for="sites">Site to delete:</label>
            <select id="sites" name="sitelist">

            <?php
              //connect to the db schema
              include("typhoonconfig.php");
              session_start();
          
              // Check connection
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }   
              

              $lsql = "SELECT * FROM site";
              $lresult = mysqli_query($conn,$lsql);
              $lrow = mysqli_fetch_array($lresult,MYSQLI_ASSOC);

              //display the sql result set in an html table
              $table = $conn->query($lsql);
              if ($table->num_rows > 0) {
                //output each result row
                while($lrow = $lresult->fetch_assoc()){
                  echo "<option value ='" . $lrow['sID'] . "'>" . $lrow['name'] . " (" . $lrow['level'] . ") </option>";
                }
              }
              
              if(isset($GET['deletesite'])){
                $deletesite = $_GET['sitelist'];
                $dsql = "DELETE FROM site WHERE sID = '$deletesite'"; 
                if (mysqli_query($conn, $dsql)) {
                  echo "Record deleted successfully";
                } else {
                  echo "Error deleting record: " . mysqli_error($conn);
                }   
              }
              
                echo $deletesite;
                ?>
            </select>
            <input type="submit" id="deletesite" name="deletesite" value="Delete">
          </form>

          
          </div>
          

          <br><br>
          <div id="addAnnouncement">
            <h3>Add Announcement</h3>
            <form>
                <label for="Announcement">Announcement Title:</label><br>
                <input type="text" id="Announcement" name="Announcement"><br>
                <label for="AnnounceDesc">Description:</label><br>
                <textarea id="announceDesc" name="AnnonceDesc" rows="4" cols="50"></textarea><br>
                <br>
                <input type="submit" id="submit2" name="submit2">
            </form>
          </div>




          <?php
    
        $name = isset($_POST['name']) ? $_POST['name'] : "";
        $myce = isset($_POST['myce']) ? $_POST['myce'] : "";
        $drugscreen = isset($_POST['drugscreen']) ? $_POST['drugscreen'] : "";
        $tb90day = isset($_POST['90daytb']) ? $_POST['90daytb'] : "";
        $tb2step = isset($_POST['2stepTB']) ? $_POST['2stepTB'] : "";
        $reqs = isset($_POST['reqs']) ? $_POST['reqs'] : "";
        $street = isset($_POST['street']) ? $_POST['street'] : "";
        $city = isset($_POST['city']) ? $_POST['city'] : "";
        $state = isset($_POST['state']) ? $_POST['state'] : "";
        $zip = isset($_POST['zip']) ? $_POST['zip'] : "";
        $level = isset($_POST['level']) ? $_POST['level'] : "";

        $title = isset($_POST['Announcement']) ? $_POST['Announcement'] : "";
        $info = isset($_POST['announceDesc']) ? $_POST['announceDesc'] : "";
        $date=strtotime("Today");


    
        if(isset($_POST['submit']) && $name != ""){
            
            //OOP insert into site table
            
/*             $insert = "INSERT INTO `site` #(`sID`, `name`, `level`, `street`, `city`, `state`, `zip`, `myce`, `90daytb`, `2steptb`, `drugscreen`, `uniquereq`) 
                                VALUES (NULL, '$name', '$level', '$street', '$city', '$state', '$zip', '$myce', '$tb90day', '$tb2step', '$drugscreen', '$reqs')";
                                

            if ($conn->query($insert) === TRUE) {
                echo "<p>New record created successfully</p>";
            } 
            else {
                echo "<p>Error: " . $insert . "<br>" . $conn->error . "</p>";
            } */
          

           // Procedural insert into site table
           $sql = "INSERT INTO `site` #(`sID`, `name`, `level`, `street`, `city`, `state`, `zip`, `myce`, `90daytb`, `2steptb`, `drugscreen`, `uniquereq`) 
           VALUES (NULL, '$name', '$level', '$street', '$city', '$state', '$zip', '$myce', '$tb90day', '$tb2step', '$drugscreen', '$reqs')";

          if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            echo "New record created successfully. Last inserted ID is: " . $last_id;
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }          

        }//end of isset if stmt

        if(isset($_POST['submit2']) && $title != ""){
          $sql2 = "INSERT INTO `announcement`
          VALUES (NULL, '$title', '$info', '$date')";

          if (mysqli_query($conn, $sql2)) {
            echo "New record created successfully.";
          } else {
              echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
          }      
        }



  $conn->close();      
    ?>
    </body>
</html>