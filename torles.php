<?php
include("lekerdezesek.php");

$piszkosID = $_POST["torlendo"];

if (isset($piszkosID) && $piszkosID !=""){
    $tisztaID = htmlspecialchars($piszkosID);
    delete($tisztaID);
}


header("location: dolgozo.php");
?>