<?php
include("lekerdezesek.php");
fejlec("Kezdőlap");

$datas = getAllComputer();

?>

    <table border="1" id="customers">
        <tr>
            <th>ID</th>
            <th>IP</th>
            <th>Karbantartas</th>
            <th>OS</th>
            <th>szint</th>
            <th>tipus</th>
        </tr>
        <?php
        foreach ($datas as $data) {
            echo '<tr>';
            echo '<td>'.$data["id"].'</td>';
            echo '<td>'.$data["ip"].'</td>';
            echo '<td>'.$data["kt"].'</td>';
            echo '<td>'.$data["os"].'</td>';
            echo '<td>'.$data["szint"].'. emelet </td>';
            echo '<td>'.$data["tipus"].'</td>';
            echo '</tr>';
        }
        ?>
    </table>
<?php
lablec();
?>