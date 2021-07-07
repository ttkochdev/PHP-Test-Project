<?php
require_once "db.php";
include "parsedata.php";
include "library.php";

$dbresults = fetchALLResults($conn);
$candy = parseCandy($dbresults);

echo "<h1>All Results</h1>";
printTable($dbresults);

?>
<h1>Candy</h1>
<?php
printTable($candy);
?>