<!DOCTYPE html>
<html>
<head>
<title>Insert Patient Info</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style = "background-image: url(img/addNewPatient.png); background-color:rgba(169, 93, 9, 0.38); ">
        <h1 class ="subheader">Add New Patient</h1>
    </div>
    <div class="mainbackground"> 
        <?php
        include 'connectdb.php';
        // ini_set('display_errors', 1);
        // ini_set('display_startup_errors', 1);
        // error_reporting(E_ALL);
        session_start();
        $patientohip = $_SESSION["ohip"]; 
        $first = $_POST["firstname"]; 
        $last = $_POST["lastname"]; 
        $birth = $_POST["birthdate"]; 
        if (empty($birth)){ // not date given 
            $query = 'INSERT INTO Patient values("' . $patientohip . '","' . $first . '","' . $last . '", NULL)';
        } else {
            $query = 'INSERT INTO Patient values("' . $patientohip . '","' . $first . '","' . $last . '","' . $birth . '")';    
        }

        $numRows = $connection->exec($query); // add
        echo "Patient Information was added!";
        $connection = NULL;
        ?>

        <div> 
            <a href="covid.html" class = "button">Return to Main Page</a>
            <a href="recordPatient.php" class = "button">Proceed to Add Vaccination Data for Patient</a>
        </div>
    </div>
    
</body>
</html>