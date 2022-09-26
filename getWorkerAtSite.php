<!DOCTYPE html>
<html>
<head>
<title>display worker</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="mainbackground">
        <?php
        include 'connectdb.php';
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
        $site = $_POST["siteName"]; 
        if (empty($site)){
            echo "<div class='warningcontainer'><p class='warning'>Patient select a site.</p></div>"; 
            include 'displayWorker.php'; 
        } else {
            echo '<div class="container" style = "background-image: url(img/workers.png); background-color:rgba(92, 60, 146, 0.72); ">'; 
            echo '<h1 class ="subheader">display location</h1>'; 
            echo '</div>'; 

            // Doctors 
            $query = "SELECT HealthcareWorker.FirstName as first, HealthcareWorker.LastName as last FROM DoctorAtSite INNER JOIN HealthcareWorker ON DoctorAtSite.DoctorID=HealthcareWorker.ID WHERE SiteName='$site'"; 
            $result = $connection->query($query);

            $html = "";
            while ($row=$result->fetch()){
                $html = $html . "<tr><td>" . $row["first"] . " " . $row["last"]. "</td></tr>"; 
            }

            echo "<table><tr><th>Doctors</th><tr>"; 
            if (empty($html)){
                echo "<tr><td>" . "N/A" .  "</td></tr>"; 
            } else {
                echo $html;
            }
            echo "</tr></table>";

            // Nurses 
            $query = "SELECT HealthcareWorker.FirstName as first, HealthcareWorker.LastName as last FROM NurseAtSite INNER JOIN HealthcareWorker ON NurseAtSite.NurseID=HealthcareWorker.ID WHERE NurseAtSite.SiteName='$site'"; 
            $result = $connection->query($query);

            $html = "";
            while ($row=$result->fetch()){
                $html = $html . "<tr><td>" . $row["first"]. " " . $row["last"] . "</td></tr>"; 
            }

            echo "<table><tr><th>Nurses</th>"; 
            if (empty($html)){
                echo "<tr><td>" . "N/A" .  "</td></tr>"; 
            } else {
                echo $html;
            }
            echo "</tr></table>";
            // link to other pages 
            echo '<a href="covid.html" class = "button">Return to Main Page</a><br>'; 
            echo '<a href="displayWorker.php" class = "button">Check More Sites</a>'; 

        }
        
        ?>
    </div>