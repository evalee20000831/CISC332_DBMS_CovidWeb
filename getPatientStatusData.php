<!DOCTYPE html>
<html>
<head>
<title>display patient status</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="mainbackground">
        <?php
        include 'connectdb.php';
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);

        $ohip = $_POST["ohip"]; 

        if (empty($ohip)){
            echo "<div class='warningcontainer'><p class='warning'>must select a patient.</p></div>"; 
            include 'patientStatus.php'; 
        } else {
            echo '<div class="container" style = "background-image: url(img/patientStatus.png); background-color:rgba(162, 213, 198, 0.72); ">'; 
            echo '<h1 class ="subheader">display patient status</h1>'; 
            echo '</div>'; 
            // the patient's name, ohip number, 
            $result = $connection->query("select FirstName, LastName from Patient where OHIPNumber='$ohip'");

            echo "<b>Name of Patient: </b>"; 
            while ($row=$result->fetch()) {
                echo $row["FirstName"] . " " . $row["LastName"] . "<br>"; 
            }
            echo "<b>OHIP Number: </b>" . $ohip . "<br>"; 

            // the date the vaccine was given & the type of vaccine that was given.
            $query = "SELECT Vaccine.CompanyName as type, Vaccination.DataReceived as date FROM (Vaccination INNER JOIN Vaccine ON Vaccine.VaccineID=Vaccination.VaccineID) WHERE Vaccination.OHIPNumber='$ohip'"; 
            $result = $connection->query($query);
            $notVaccine = True; 

            while ($row=$result->fetch()) {
                echo "<b>Type: </b>" . $row["type"] . "; <b>Date Received: </b>" . $row["date"] . "<br>"; 
                $notVaccine = False; 
            }
            if ($notVaccine){
                echo "<i>Have not received any vaccination.</i><br>"; 
            }

            echo '<a href="covid.html" class = "button">Return to Main Page</a><br>'; 
            echo '<a href="patientStatus.php" class = "button">Check Another Patient</a>'; 

            }

        ?>
    </div>
</body>
</html>