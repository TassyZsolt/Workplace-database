<?php
/**    Csatlakozas   */
function csatlakozas(){
    $con = mysqli_connect('localhost','root', '','munkahely');
    if(false == mysqli_select_db($con, "munkahely")){
        return null;
    }
    $con->set_charset("utf8");

    return $con;
}
/**  Dolgozo torlese  */
function delete($ID){
    $conn = csatlakozas();
    $torles = "DELETE FROM dolgozo WHERE dolgozo.ID = $ID";
    if (mysqli_query($conn, $torles)) {
        echo "Sikeres torlés";
    } else {
        echo "Valami probléma torötént törlés folyaman: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

/** Uj dolgozo  */
function ujDolgozo($nev,$szuletesi_ido,$beosztas,$varos,$helyiseg,$telefonszam)
{
    $conn = csatlakozas();
    $dolgozo = "INSERT INTO `dolgozo` (`ID`, `Nev`, `Szuletesi_Ido`, `Beosztas`, `Varos_ID`, `helyiseg_ID`,`telefon_ID`) VALUES (NULL, '".$nev."', '".$szuletesi_ido."', '".$beosztas."', '".$varos."', '".$helyiseg."', '".$telefonszam."');";
    return query($conn,$dolgozo);

}

/**  uj Telefon  */
function ujTelefon($telefonszam,$garancia,$szerviz,$gyarto)
{
    $conn = csatlakozas();
    $telefon ="INSERT INTO `telefon` (`ID`, `Telefonszam`, `Garancia`, `Szervizelt`, `Gyarto`) VALUES (NULL, '".$telefonszam."', '".$garancia."', '".$szerviz."', '".$gyarto."');";
    return query($conn,$telefon);
}

/**  uj Szamitogep  */
function ujSzamitogep($tisztaip,$tisztakt,$tisztaos,$tisztahid)
{
    $conn = csatlakozas();
    $szamitogep = "INSERT INTO `szamitogep` (`ID`, `IP`, `Karbantartas`, `OS`, `helyiseg_ID`) VALUES (NULL, '".$tisztaip."', '".$tisztakt."', '".$tisztaos."', '".$tisztahid."');";
    return query($conn,$szamitogep);
}


/** get all tell from "telefonszamok" */
function getAllPhoneNumber(){
    $conn = csatlakozas();
    $text = "Select * from telefon";

    $array = mysqli_query($conn, $text);

    return $array;
}

/** get all computer */
function getAllComputer(){
    $conn = csatlakozas();
    $text = "
Select
    szamitogep.ID as 'id',
    szamitogep.IP as 'ip',
    szamitogep.Karbantartas as 'kt',
    szamitogep.OS as 'os',
    helyiseg.szint as 'szint',
    helyiseg.tipus as 'tipus'
from szamitogep
    LEFT JOIN helyiseg ON helyiseg.ID = szamitogep.helyiseg_ID";

    $array = mysqli_query($conn, $text);

    return $array;
}


function query($conn,$text){
    if (mysqli_query($conn, $text))
    {
        mysqli_close($conn);
        return true;
    }
    else
    {
        mysqli_close($conn);
        return false;
    }
}


function fejlec($text){
?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <?php
    echo "<title>$text</title>"
    ?>
</head>
<body>

<ul>
    <li><a href="index.php">Kezdőlap</a></li>
    <li><a href="dolgozo.php">Dolgozok Listája</a></li>
    <li><a href="uj_dolgozo.php">Dolgozó Felvétel </a></li>
    <li><a href="szamitogepek_kiosztas.php">Számítógépek Listája</a></li>
    <li><a href="uj_szamitogep.php">Számítógép felvétele</a></li>
    <li><a href="uj_telefon.php">Telefon Listája</a></li>
    <li><a href="telefonok_kiosztasa.php">Telefonok Kiosztása</a></li>
</ul>
<main>
    <?php
}
function lablec() {
?>
</main>
</body>
</html>
<?php
}
