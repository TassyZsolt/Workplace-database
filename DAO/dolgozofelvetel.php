<?php

include("../lekerdezesek.php");

$piszkosOsztalyNev = $_POST["Nev"];
$piszkosSzuletesIdo = $_POST["szuletesi_ido"];
$piszkosBeosztas= $_POST["beosztas"];
$piszkosVaros = $_POST["Varos_ID"];
$piszkosHelyiseg = $_POST["helyiseg_ID"];
$piszkosTelefonszam = $_POST["telefon_ID"];

if (isset($piszkosOsztalyNev) && $piszkosOsztalyNev != "" &&
    isset($piszkosSzuletesIdo) && $piszkosSzuletesIdo != "" &&
    isset($piszkosBeosztas) && $piszkosBeosztas != "" &&
    isset($piszkosVaros) && $piszkosVaros != "" &&
    isset($piszkosHelyiseg) && $piszkosHelyiseg != "" &&
    isset($piszkosTelefonszam) && $piszkosTelefonszam != ""
) {

    $tisztaOsztalyNev = htmlspecialchars($piszkosOsztalyNev);
    $tisztaSzuletesIdo = htmlspecialchars($piszkosSzuletesIdo);
    $tisztaBeosztas = htmlspecialchars($piszkosBeosztas);
    $tisztaVaros = htmlspecialchars($piszkosVaros);
    $tisztaHelyiseg = htmlspecialchars($piszkosHelyiseg);
    $tisztaTelefonszam = htmlspecialchars($piszkosTelefonszam);

    $sikeres = ujDolgozo($tisztaOsztalyNev, $tisztaSzuletesIdo,$tisztaBeosztas,$tisztaVaros
    ,$tisztaHelyiseg,$tisztaTelefonszam);
    if ($sikeres == false ) {
        die("nem sikerült a rögzités");
    }else{
        header("location: ../dolgozo.php");

    }

}

