<?php
require_once "db.php";
include "parsedata.php";
include "library.php";

$dbresults = fetchALLResults($conn);
$candy = parseCandy($dbresults);
$callme = parseCallMe($dbresults);
$refer = parseRefer($dbresults);
$signature = parseSignature($dbresults);


echo "<h1>All Comments</h1>";
echo "<div>";
printTable($dbresults);
echo "</div>";
?>
<h1>Comments about candy</h1>
<div>
<?php
printTable($candy);
?>
</div>

<h1>Comments about call me / don't call me</h1>
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

<h1>Comments about signature requirements upon delivery</h1>
<div>
<?php
printTable($signature);
?>
</div>