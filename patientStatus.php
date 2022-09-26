<!DOCTYPE html>
<html>
<head>
<title>display patient status</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include 'connectdb.php';
    ?>
    <div class="container" style = "background-image: url(img/patientStatus.png); background-color:rgba(162, 213, 198, 0.72); ">
        <h1 class ="subheader">display patient status</h1>
    </div>
    <div class="mainbackground">
        <p>Please choose a patient from the list</p> 
        <form action="getPatientStatusData.php" method="post"> 
            <?php
            
            $query = "SELECT FirstName, LastName, OHIPNumber FROM Patient";
            $result = $connection->query($query);
            while ($row = $result->fetch()) {
                
                echo '<input type="radio" name="ohip" value="';
                echo $row["OHIPNumber"]; 
                echo '">' . $row["FirstName"] . " " . $row["LastName"] . "<br>";
            }
            ?>
            <input type="submit" value="Confirm">

        </form> 

        <br><a href="covid.html" class = "button">Return to Main Page</a><br>
    </div>

</body>
</html>