<?php
include 'connectdb.php';
$ohip = $_POST["ohip"]; 
session_start();
$_SESSION["ohip"]= $_POST["ohip"]; 

$query = "SELECT OHIPNumber FROM Patient where OHIPNumber='$ohip'";
$result = $connection->query($query);
$present = False; 
while ($row=$result->fetch()){ 
    if (!empty($row["OHIPNumber"])){ // if the patient already exist, ask again
        $present = True; 
    } 
}
if ($present){
    echo "<div class='warningcontainer'><p class='warning'>Patient already exists. Please Try again.</p></div>"; 
    include 'addNewPatient.php'; 
} else {
    include 'askPatientInfo.php'; 
}
?>