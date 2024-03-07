<?php

include("../lekerdezesek.php");

$piszkosTelefonszam = $_POST["Telefonszam"];
$piszkosGarancia = $_POST["Garancia"];
$piszkosSzerviz = $_POST["Szerviz"];
$piszkosGyarto = $_POST["Gyarto"];


if (isset($piszkosTelefonszam) && $piszkosTelefonszam != "" &&
    isset($piszkosGarancia) && $piszkosGarancia != "" &&
    isset($piszkosSzerviz) && $piszkosSzerviz != "" &&
    isset($piszkosGyarto) && $piszkosGyarto != ""
) {

    $tisztaTelefonszam = htmlspecialchars($piszkosTelefonszam);
    $tisztaGarancia = htmlspecialchars($piszkosGarancia);
    $tisztaSzerviz = htmlspecialchars($piszkosSzerviz);
    $tisztaGyarto = htmlspecialchars($piszkosGyarto);

    $sikeres = ujTelefon($tisztaTelefonszam,$tisztaGarancia,$tisztaSzerviz,$tisztaGyarto);
    if ($sikeres == false ) {
        die("nem sikerült a rögzités");
    }else{
        header("location: ../telefonok_kiosztasa.php");

    }

}

