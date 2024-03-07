<?php
include("lekerdezesek.php");
fejlec("Kezdőlap");

$conn = csatlakozas();
$lekerd_helyiseg = "SELECT * FROM helyiseg;";
$helyiseg = $conn->query($lekerd_helyiseg);
?>

<form action="DAO/szamitogeőfelvetel.php" method="post">

    <label>IP cím</label><br>
    <input type="text" id="ip" name="ip"><br>

    <label>Karbantartás</label><br>
    <input type="date" id="kt" name="kt" ><br><br>

    <label>OS rendszer</label><br>
    <input type="text" id="os" name="os"><br><br>

    <label>Helyiség</label><br>
    <select name="helyiseg_ID" id="helyiseg_ID">
        <option value=""></option>
        <?php
        foreach ( $helyiseg as $sor) {
            echo '<option value="'.$sor["ID"].'">'.$sor["Szint"].'. Emeleti '.$sor["Tipus"].'</option>';
        }
        ?>
    </select>
    </select>

    <input type="submit" value="Mentés">
</form>

<?php
lablec();
?>
