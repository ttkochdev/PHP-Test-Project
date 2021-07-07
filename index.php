<?php
require_once "db.php";
include "parsedata.php";



$sql = $conn->prepare("SELECT * FROM sweetwater_test");
$sql->execute();

if($sql->rowCount()) {
?>
<table border="0">
    <tr COLSPAN=2 BGCOLOR="#6D8FFF">
        <td>Order ID</td>
        <td>Comments</td>
        <td>shipdate_expected</td>
    </tr>
<?php
while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
?>
    <tr>
        <td><?php print($row['orderid']); ?></td>
        <td><?php print($row['comments']); ?></td>
        <td><?php print($row['shipdate_expected']); ?></td>
    </tr>
<?php
}
?>
</table>
<?php
} else {

    print('No results found');

}
?>