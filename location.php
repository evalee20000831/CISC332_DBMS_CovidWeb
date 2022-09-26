<!DOCTYPE html>
<html>
<head>
<title>display location</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include 'connectdb.php';
    ?>
    <div class="container" style = "background-image: url(img/locations.png); background-color:rgba(215, 38, 49, 0.72); ">
        <h1 class ="subheader">display location</h1>
    </div>
    <div class="mainbackground">
        <form action="getLocationData.php" method="post"> 
            <?php
            
            $query = "SELECT Name FROM Company";
            $result = $connection->query($query);
            echo "Please choose a vaccine type</br>";
            while ($row = $result->fetch()) {
                
                echo '<input type="radio" name="typeName" value="';
                echo $row["Name"]; 
                echo '">' . $row["Name"] . "<br>";
            }
            ?>
            <input type="submit" value="Confirm">

        </form> 

        <br><a href="covid.html" class = "button">Return to Main Page</a><br>
    </div>

</body>
</html>