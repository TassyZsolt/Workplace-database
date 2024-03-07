<?php
include("lekerdezesek.php");
fejlec("Kezdőlap");
?>


    <form action="DAO/Telefonfelvetel.php" method="post">
        
        <label>TelefonSzám</label><br>
        <input type="text" id="telefonszam" name="Telefonszam"><br>
        
        <label>Garancia</label><br>
        <input type="date" id="Garancia" name="Garancia" ><br><br>

        <label>Szervíz</label><br>
        <input type="radio" id="Szervizelt" name="Szerviz" value="1" ><input type="radio" id="Szervizelt" name="Szerviz" value="0" ><br><br>

        <label>Gyártó</label><br>
        <input type="text" id="Gyarto" name="Gyarto" ><br><br>

        <input type="submit" value="Mentés">
    </form>


<?php
lablec();
?>