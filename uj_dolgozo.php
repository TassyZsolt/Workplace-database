<?php
include("lekerdezesek.php");
fejlec("Kezdőlap");

$conn = csatlakozas();

$lekerd_varos = "SELECT varos.Nev, varos.ID,varos.Iranyitoszam FROM varos;";
$lekerd_helyiseg = "SELECT * FROM helyiseg;";
$lekerd_telefon = "SELECT telefon.Telefonszam ,telefon.ID FROM telefon;";

$varos= $conn->query($lekerd_varos);
$helyiseg = $conn->query($lekerd_helyiseg);
$telefon = $conn->query($lekerd_telefon);
?>


    <form action="DAO/dolgozofelvetel.php" method="post">

        <label>Név</label><br>
        <input type="text" id="Nev" name="Nev"><br>

        <label>Születési Idő</label><br>
        <input type="date" id="szuletesi_ido" name="szuletesi_ido" ><br><br>

        <label>Beosztás</label><br>
        <input type="text" id="Beosztas" name="beosztas" ><br><br>

        <label>Város</label><br>
        <!--        <input type="text" id="Varos_ID" name="Varos_ID" ><br><br>TODO: SELECT-->
        <select name="Varos_ID" id="Varos_ID">
            <option value=""></option>
            <?php
            foreach ( $varos as $sor) {
                echo '<option value="'.$sor["ID"].'">'.$sor["Nev"].' '.$sor["Iranyitoszam"].'</option>';
            }
            ?>
        </select>

        <label>Helyiség</label><br>
        <!--        <input type="text" id="lname" name="lname" ><br><br>TODO: SELECT-->
        <select name="helyiseg_ID" id="helyiseg_ID">
            <option value=""></option>
            <?php
            foreach ( $helyiseg as $sor) {
                echo '<option value="'.$sor["ID"].'">'.$sor["Szint"].'.Emeleti '.$sor["Tipus"].'</option>';
            }
            ?>
        </select>

        <label>TelefonSzám</label><br>
        <!--        <input type="text" id="lname" name="lname" ><br><br>TODO: SELECT-->
        <select name="telefon_ID" id="telefon_ID">
            <option value=""></option>
            <?php
            foreach ( $telefon as $sor) {
                echo '<option value="'.$sor["ID"].'">'.$sor["Telefonszam"].'</option>';
            }
            ?>
        </select>
        <input type="submit" value="Mentés">
    </form>


<?php
lablec();
?>