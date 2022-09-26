<!DOCTYPE html>
<html>
<head>
<title>Add New Patient</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include 'connectdb.php';
    ?>

    <div class="container" style = "background-image: url(img/addNewPatient.png); background-color:rgba(169, 93, 9, 0.38); ">
        <h1 class ="subheader">Add New Patient</h1>
    </div>
    
    <div class="mainbackground">
        <form action="checkOHIP.php" method="post">
            <p>Patient's OHIP number</p>
            <input type="text" name="ohip"> <br>
            <input type="submit"> 
        </form>

        <br><a href="covid.html" class = "button">Return to Main Page</a><br>
    </div>

</body>
</html>