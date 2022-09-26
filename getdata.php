<?php
include 'connectdb.php';
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
echo '<div class="container" style = "background-image: url(img/recordPatient.png); background-color:rgba(7, 123, 138, 0.72); ">'; 
echo '<h1 class ="subheader">Record Patient</h1>';
echo '</div>';

$result = $connection->query("select OHIPNumber from Patient");
// result = [[], [], []...] 
// row = [] 
$patientohip = $_POST["ohip"]; 
$notPresent = True; 
while ($row=$result->fetch()) {
    if ($patientohip == $row[0]){ 
        // find 
        $notPresent = False; 
    }
}

if ($notPresent){

    session_start();
    $_SESSION["ohip"]= $patientohip; 
    include 'askPatientInfo.php';

} else{ 

    include 'askVaccinationInfo.php'; 
}
?>
