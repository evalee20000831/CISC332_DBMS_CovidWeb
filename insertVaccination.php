<!DOCTYPE html>
<html>
<head>
<title>Insert Patient Info</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="mainbackground"> 
        <?php
        include 'connectdb.php';
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);

        // check if lot number is at the table vaccineAtSite 
        $result = $connection->query("select * from VaccineAtSite");
        $site = $_POST["site"]; 
        $lotID = $_POST["lotID"]; 
        $ohip = $_POST["ohip"]; 
        $dateReceived = $_POST["dateReceived"]; 
        $notPresent = True;  

        while ($row=$result->fetch()) {
            if ($row["VaccineID"] == $lotID && $row["SiteName"] == $site){
                $notPresent = False; 
            }
        }

        // if the same lot is added, it's also a mistake 
        $result = $connection->query("select LotID from Vaccination where OHIPNumber='$ohip'");
        $exist = False; 
        while ($row=$result->fetch()) {
            if ($row["LotID"]==$lotID){
                $exist = True; 
            }
        }

        // if lot number is not at the table vaccineAtSite, send back 
        if ($notPresent){
            echo "<div class='warningcontainer'><p class='warning'>"; 
            echo "The given vaccine number is not provided in the given vaccine site. "; 
            echo "Please try again."; 
            echo "</p></div>"; 
            include 'getdata.php'; 
        } elseif ($exist){
            echo "<div class='warningcontainer'><p class='warning'>"; 
            echo "The given vaccine number is already recorded. Please try again"; 
            echo "</p></div>";
            include 'getdata.php'; 
        } else {
            // if lot number is at the table vaccineAtSite, record the vaccination  
            // data receoved and lot number 
            if (empty($dateReceived)){ // not date given 
                $query = 'INSERT INTO Vaccination values(NULL ,"' . $lotID . '","' . $ohip . '","' . $lotID . '")';
            } else {
                $query = 'INSERT INTO Vaccination values("' . $dateReceived . '","' . $lotID . '","' . $ohip . '","' . $lotID . '")';
            }             
            
            $numRows = $connection->exec($query); // add
            echo "<i>Vaccination Information was added!</i><br>";

            // show them all vaccinations: data receoved, lot number, and location
            $query = "SELECT DataReceived, LotID FROM Vaccination where OHIPNumber='$ohip'";
            $result = $connection->query($query);

            echo "<b>Vaccination Report</b><br>"; 
            echo "<table>"; 
            echo "<tr><th>Date Received</th><th>Lot Number</th><th>Received Site</th><tr>"; 
            while ($row = $result->fetch()) {
                
                echo "<tr><td>" . $row["DataReceived"] . "</td><td>" . $row["LotID"] ."</td>" ; 
                $query2 = "SELECT SiteName FROM VaccineAtSite where VaccineID='" . $row['LotID'] . "'";
                $siteResult = $connection->query($query2);
                $siteRow = $siteResult->fetch(); 
                echo "<td>". $siteRow["SiteName"] . "</td></tr>"; 
            
            }
            echo "</table>"; 
            echo '<a href="covid.html" class = "button">Return to Main Page</a><br>'; 
            echo '<a href="recordPatient.php" class = "button">Record for Another Patient</a>'; 
        }
        ?>
    </div>
</body>
</html>