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
        // show all the vaccination sites that have (or will) offer that type of vaccine 
            // along with the total number of doses that have shipped to that site.

        $type = $_POST["typeName"]; 
         
        if (empty($type)){
            echo "<div class='warningcontainer'><p class='warning'>must select a type.</p></div>"; 
            include 'location.php'; 
        } else {
            echo '<div class="container" style = "background-image: url(img/locations.png); background-color:rgba(215, 38, 49, 0.72); ">'; 
            echo '<h1 class ="subheader">display location</h1>'; 
            echo '</div>'; 
            echo "<b>" . $type . "</b>";
            echo "<table>"; 
            $query = "select DISTINCT SiteName from Vaccine inner join VaccineAtSite on Vaccine.VaccineID=VaccineAtSite.VaccineID WHERE Vaccine.CompanyName='$type'"; 
            $result = $connection->query($query); 
            $noSite = True; 
            $siteIDs = array(); 
            echo "<tr><th>Vaccination Site</th>"; 
            while ($row=$result->fetch()){
                echo "<td>" . $row["SiteName"]. "</td>" ; 
                $siteIDs[] = $row["SiteName"]; 
                $noSite = False; 
            }
            if ($noSite){
                echo "<td>N/A</td>"; 
            }
            
            // lot ID 
            echo "<tr><th>Lot at Sites </th>";
            $noID = True;
            foreach ($siteIDs as $site){
                $noID = False;  
                $query = "select Vaccine.VaccineID from VaccineAtSite inner join Vaccine on Vaccine.VaccineID=VaccineAtSite.VaccineID WHERE SiteName='$site' and Vaccine.CompanyName='$type'"; 
                $result = $connection->query($query);
                echo "<td>"; 
                while ($row=$result->fetch()){
                    echo "- " . $row["VaccineID"] . "<br>"; 
                }
                echo "</td>" ; 
            }
            if ($noID){
                echo "<td>N/A</td>"; 
            }
            echo "</tr>"; 
            
            // number of doses
            echo "<tr><th> Number of Doses</th>"; 
            $query = "select VaccineAtSite.SiteName, SUM(VaccineLot.NumberOfDoses) as total from (VaccineLot inner join Vaccine on VaccineLot.ID=Vaccine.VaccineID) inner join VaccineAtSite on VaccineAtSite.VaccineID=VaccineLot.ID WHERE Vaccine.CompanyName='$type' Group by VaccineAtSite.SiteName"; 
            $result = $connection->query($query);
            $noDoses = True; 

            while ($row=$result->fetch()){
                echo "<td>" . $row["total"]. "</td>" ; 
                $noDoses = False; 
            }
            if ($noDoses){
                echo "<td>N/A</td>" ; 
            }
            echo "</tr> </table><br>"; 

            echo '<a href="covid.html" class = "button">Return to Main Page</a><br>'; 
            echo '<a href="location.php" class = "button">Check More Types</a>'; 
            }
        ?>
    </div>
</body>
</html>