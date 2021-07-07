<?php
require_once "db.php";
include "parsedata.php";
include "library.php";

$dbresults = fetchALLResults($conn);
$candy = parseCandy($dbresults);
$callme = parseCallMe($dbresults);
$refer = parseRefer($dbresults);

echo "<h1>All Results</h1>";
echo "<div>";
printTable($dbresults);
echo "</div>";
?>
<h1>Candy</h1>
<div>
<?php
printTable($candy);
?>
</div>

<h1>Call Me / Don't Call Me</h1>
<div>
<?php
printTable($callme);
?>
</div>

<h1>Comments about who referred me</h1>
<div>
<?php
printTable($refer);
?>
</div>