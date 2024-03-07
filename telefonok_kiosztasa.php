<?php
include("lekerdezesek.php");
fejlec("Kezdőlap");

$datas = getAllPhoneNumber();

?>
    <table border="1" id="customers">
        <tr>
            <th>ID</th>
            <th>Telefonszám</th>
            <th>Garancia</th>
            <th>Szervizelt</th>
            <th>Gyartó</th>
        </tr>
        <?php
        foreach ($datas as $data) {
            echo '<tr>';
            echo '<td>'.$data["ID"].'</td>';
            echo '<td>'.$data["Telefonszam"].'</td>';
            echo '<td>'.$data["Garancia"].'</td>';
            echo '<td>'.($data["Szervizelt"] == 1 ? 'igen' : 'nem') .'</td>';
            echo '<td>'.$data["Gyarto"].'</td>';
            echo '</tr>';
        }
        ?>
    </table>
<?php
lablec();
?>