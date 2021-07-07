<?php
require_once "db.php";
include "parsedata.php";
include "library.php";

//run to get initial database results to prep for date updates.
$dbresults = fetchALLResults($conn);

//update shipdates based on comments
$orderidDateArray = cleanUpDatetimeData($dbresults);
insertDatetime($conn, $orderidDateArray);

//run database fetch again to get fresh data to display.
$dbresults = fetchALLResults($conn);

//parse all of the commented and sort to be displayed
$candy = parseCandy($dbresults);
$callme = parseCallMe($dbresults);
$refer = parseRefer($dbresults);
$signature = parseSignature($dbresults);
$misc = parseMisc($dbresults);

//display everything if you want! (not on the list of requirements)
/* echo "<h1>All Comments</h1>";
echo "<div>";
printTable($dbresults);
echo "</div>"; */
//$da=stringToDatetime("01/05/18");
//echo $da;
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

<h1>Miscellaneous comments (everything else)</h1>
<div>
<?php
printTable($misc);

?>
</div>
