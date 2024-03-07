<?php

include("../lekerdezesek.php");

$piszkosip = $_POST["ip"];
$piszkoskt = $_POST["kt"];
$piszkosos = $_POST["os"];
$piszkoshid = $_POST["helyiseg_ID"];


if (isset($piszkosip) && $piszkosip != "" &&
    isset($piszkoskt) && $piszkoskt != "" &&
    isset($piszkosos) && $piszkosos != "" &&
    isset($piszkoshid) && $piszkoshid != ""
) {

    $tisztaip = htmlspecialchars($piszkosip);
    $tisztakt = htmlspecialchars($piszkoskt);
    $tisztaos = htmlspecialchars($piszkosos);
    $tisztahid = htmlspecialchars($piszkoshid);

    $sikeres = ujSzamitogep($tisztaip,$tisztakt,$tisztaos,$tisztahid);
    if ($sikeres == false ) {
        die("nem sikerült a rögzités");
    }else{
        header("location: ../szamitogepek_kiosztas.php");

    }

}

