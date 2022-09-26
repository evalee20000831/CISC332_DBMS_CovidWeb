<!DOCTYPE html>
<html>
<head>
<title>display worker</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include 'connectdb.php';
    ?>
    <div class="container" style = "background-image: url(img/workers.png); background-color:rgba(92, 60, 146, 0.72); ">
        <h1 class ="subheader">display workers</h1>
    </div>
    <div class="mainbackground">
        <form action="getWorkerAtSite.php" method="post"> 
            <?php
                $query = "SELECT Name FROM VaccinationSite";
                $result = $connection->query($query);
                while ($row = $result->fetch()) {
                    
                    echo '<input type="radio" name="siteName" value="';
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