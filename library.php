<?php
function printTable($data){
    if($data) {
        ?>
        <table border="0">
            <tr COLSPAN=2 BGCOLOR="#6D8FFF">
                <td>Order ID</td>
                <td>Comments</td>
                <td>shipdate_expected</td>
            </tr>
        <?php
        foreach($data as $row) { //still hard coded for now. need to pass in array into function to loop over
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
}

function stringToDatetime($string){
    $date = DateTime::createFromFormat('m/d/y H:i:s', $string.' 00:00:00');
    $mysql_date_string = $date->format('Y-m-d H:i:s');
    return $mysql_date_string;
}

?>