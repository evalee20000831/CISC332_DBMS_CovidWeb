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
    <div class="container" style = "background-image: url(img/addNewPatient.png); background-color:rgba(169, 93, 9, 0.38); ">
        <h1 class ="subheader">Add New Patient</h1>
    </div>
    
    <div class="mainbackground">
        <form action="insertPatientInfo.php" method="post">
            <p>Patient Not Found. Please provide more data.</p>
            <p>First Name:</p>
            <input type="text" name="firstname"> <br>
            <p>Last Name:</p>
            <input type="text" name="lastname"> <br>
            <p>Birth Date:</p>
            <input type="date" name="birthdate"> <br>
            <input type="submit"> 
        </form>
    </div>

</body>
</html>

