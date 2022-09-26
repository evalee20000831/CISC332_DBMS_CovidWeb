<!DOCTYPE html>
<html>
<head>
<title>record patient</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="mainbackground">
        <p>Please provide patient's vaccination data</p>
        <form action="insertVaccination.php" method="post"> 
            <?php
            
            $query = "SELECT Name FROM VaccinationSite";
            $result = $connection->query($query);
            echo "Which clinic the vaccine was administered at?</br>";
            while ($row = $result->fetch()) {
                
                echo '<input type="radio" name="site" value="';
                echo $row["Name"]; 
                echo '">' . $row["Name"] . "<br>";
            }
            ?>
            <p>Lot Number:</p>
            <input type="text" name="lotID"><br>
            <p>Date Received:</p>
            <input type="date" name="dateReceived"><br>
            <input type="hidden" name="ohip" value="<?php 
            
            echo $_POST['ohip'] ?>">
            <input type="submit" value="Confirm">

        </form> 
    </div>
</body>
</html>