<!DOCTYPE html>
<html>
<head>
<title>record patient</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include 'connectdb.php';
    ?>
    <div class="container" style = "background-image: url(img/recordPatient.png); background-color:rgba(7, 123, 138, 0.72); ">
        <h1 class ="subheader">Record Vaccination</h1>
    </div>
    <div class="mainbackground">
        <form action="getdata.php" method="post">
            <p>Patient's OHIP number</p>
            <input type="text" name="ohip"> <br>
            <input type="submit"> 
        </form>

        <br><a href="covid.html" class = "button">Return to Main Page</a><br>
    </div>

</body>
</html>