<?php
include("lekerdezesek.php");
fejlec("Kezdőlap");

$conn = csatlakozas();

$lekerd = "
SELECT dolgozo.ID AS 'ID',
       dolgozo.Nev AS 'Nev',
       dolgozo.Szuletesi_Ido AS 'Szuletes_ido', 
       dolgozo.Beosztas AS 'Beosztas', 
       varos.IranyitoSzam AS 'IRSZ',
       varos.Nev AS 'Vnev',
       helyiseg.Tipus AS 'Htipus',
       helyiseg.Meret AS 'Hmeret',
       helyiseg.Szint AS 'Hszint'
FROM dolgozo
    LEFT JOIN varos ON varos.ID = dolgozo.Varos_ID
    LEFT JOIN helyiseg ON helyiseg.ID = dolgozo.helyiseg_ID
ORDER BY helyiseg.Szint;
";

$lekerdezesegy = $conn->query($lekerd);

echo '<table border=1 id="customers">';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Név</th>';
echo '<th>Születés idő</th>';
echo '<th>Beosztás</th>';
echo '<th>Írányitó Szám</th>';
echo '<th>Helyiség neve</th>';
echo '<th>Helyiség típusa</th>';
echo '<th>Helyiség mérete</th>';
echo '<th>Helyiség szintje</th>';
echo '</tr>';


foreach ( $lekerdezesegy as $sor) {
    echo '<tr>';
    echo '<td>' . $sor["ID"] . '</td>';
    echo '<td>' . $sor["Nev"] . '</td>';
    echo '<td>' . $sor["Szuletes_ido"] . '</td>';
    echo '<td>' . $sor["Beosztas"] . '</td>';
    echo '<td>' . $sor["IRSZ"] . '</td>';
    echo '<td>' . $sor["Vnev"] . '</td>';
    echo '<td>' . $sor["Htipus"] . '</td>';
    echo '<td>' . $sor["Hmeret"] . '</td>';
    echo '<td>' . $sor["Hszint"] . '</td>';
    echo '<td>
        <form method="post" action="torles.php">
            <input type="hidden" name="torlendo" value="'.$sor["ID"].'" />
            <input type="submit" value="Törés">
        </form></td>';
    echo '</tr>';
}

echo '</table>';
$conn = null;
lablec();
?>


