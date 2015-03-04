<?php include_once "includes/dbconf.php"; ?>
<?php include_once "includes/productdetailvar.php"; ?>
<?php
$cap = isset($_GET['cap']) ? $_GET['cap'] : '';
$marquee = isset($_GET['fmarquee']) ? $_GET['fmarquee'] : '';
$chairs = isset($_GET['fwoodchair']) ? $_GET['fwoodchair'] : '';
$trestle = isset($_GET['ftrestletable']) ? $_GET['ftrestletable'] : '';
$round = isset($_GET['froundtable']) ? $_GET['froundtable'] : '';
$festoon = isset($_GET['ffestoonlight']) ? $_GET['ffestoonlight'] : '';
$par = isset($_GET['fparcan']) ? $_GET['fparcan'] : '';
$fairy = isset($_GET['ffairylight']) ? $_GET['ffairylight'] : '';
$dancfloor = isset($_GET['fdancefloor']) ? $_GET['fdancefloor'] : '';
$user = isset($_GET['ften']) ? $_GET['ften'] : '';
$email = isset($_GET['feleven']) ? $_GET['feleven'] : '';
$comment = isset($_GET['ftwelve']) ? $_GET['ftwelve'] : '';
$eventdate = isset($_GET['fthirteen']) ? $_GET['fthirteen'] : '';
$postcode = isset($_GET['ffourteen']) ? $_GET['ffourteen'] : '';
$dateofsub  = date("d-m-y-H-i");
// Work out all email form values needed
$marqueetotal = $marquee * $marqueehireprice;
$chairtotal = $chairs * $woodenhireprice;
$trestletotal = $trestle * $trestlehireprice;
$roundtotal = $round   * $roundhireprice;
$festoontotal = $festoon * $festoonhireprice;
$partotal = $par * $parhireprice;
$fairytotal = $fairy   * $fairyhireprice;
$dancetotal = $dancfloor * $dancehireprice;
//work out totals
$subtotal = $marqueetotal + $chairtotal + $trestletotal + $roundtotal + $festoontotal + $partotal + $fairytotal + $dancetotal;
$vattotal = ($subtotal / 100) * 20;
$totaltotal = $subtotal + $vattotal;
$subtotal = number_format((float)$subtotal, 2, '.', '');
$vattotal = number_format((float)$vattotal, 2, '.', '');
$totaltotal = number_format((float)$totaltotal, 2, '.', '');
//Send Customer details to DB
$sql = "INSERT INTO custorder (username, email, postcode, comment, chaser, invoice, deleted, eventdate, estimatedate, capacity, costtotal, profittotal, subtotal, vat, total, orderref) VALUES ('$user', '$email', '$postcode', '$comment ', 'null', 'null','null', '$eventdate', '$dateofsub', '$cap',  'null',  'null', '$subtotal', '$vattotal', '$totaltotal',  'null' )";
$result = mysql_query($sql);
// get current ID
$orderref = mysql_insert_id();
if($result){
//Send Products to DB - with UNique ID
$sql = "INSERT INTO orderdetails (product, qty, hireprice, costprice, total, orderref, id, visible) VALUES ('$marqueetitle', '$marquee', '$marqueehireprice','$marqueecostprice', '$marqueetotal', '$orderref', 'null', 'y'),
('$woodentitle', '$chairs', '$woodenhireprice','$woodencostprice',  '$chairtotal', '$orderref', 'null', 'y'),
('$trestletitle', '$trestle', '$trestlehireprice','$trestlecostprice',  '$trestletotal', '$orderref', 'null', 'y'),
('$roundtitle', '$round', '$roundhireprice','$roundcostprice',  '$roundtotal', '$orderref', 'null', 'y'),
('$festoontitle', '$festoon', '$festoonhireprice','$festooncostprice',  '$festoontotal', '$orderref', 'null', 'y'),
('$partitle', '$par', '$parhireprice','$parcostprice',  '$partotal', '$orderref', 'null', 'y'),
('$fairytitle', '$fairy', '$fairyhireprice','$fairycostprice',  '$fairytotal', '$orderref', 'null', 'y'),
('$dancetitle', '$dancfloor', '$dancehireprice','$dancecostprice',  '$dancetotal', '$orderref', 'null', 'y')";
$result = mysql_query($sql);
if($result){
include_once "pdf/estimate-pdf.php";
//SEND EMAIL WITH PDF
include_once "emails/estimate.php"; 
}
else {
echo "ERROR";
}
}
else {
echo "ERROR";
}
mysql_close();
 ?>