<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<?php include_once "includes/dbconf.php"; ?>
<?php include_once "includes/productdetailvar.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title></title>
<meta name="description" content="hire price list for marquee hrie">

<!-- CSS -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/css.php'); ?>
<!-- CSS -->
<meta property='og:title' content='Marquee hire and equipment price list'/>

</head>

<body class="pull_top">
<!-- NAV -->
<?php // include($_SERVER["DOCUMENT_ROOT"].'/template/nav.php'); ?>
<!-- NAV -->



<style>
</style>


<?php // ADD OR REMOVE PRODUCT FROM CUST ORDER

$deleteproduct = isset($_GET['id']) ? $_GET['id'] : '';
//$deleteproduct = $_GET['id'];
if($deleteproduct != ''){
  mysql_query("UPDATE orderdetails SET visible= 'd' WHERE id='$deleteproduct'");
}


$addtoorder = isset($_GET['addtoorder']) ? $_GET['addtoorder'] : '';
if($addtoorder != ''){
  mysql_query("UPDATE orderdetails SET visible= 'y' WHERE id='$addtoorder'");
}
$removefromorder = isset($_GET['removefromorder']) ? $_GET['removefromorder'] : '';
if($removefromorder != ''){
  mysql_query("UPDATE orderdetails SET visible= 'n' WHERE id='$removefromorder'");
}
?>



<?php //GET ALL THE VARIABLES

$fullctotal = '0';
$fullhtotal = '0';
$profittotal= '0';
      $orderref = $_GET["orderref"];
$strSQL = "SELECT * FROM custorder WHERE orderref='$orderref'"; $rs = mysql_query($strSQL); while($row = mysql_fetch_array($rs)) {
      $mainsubtotal =  $row["subtotal"]; 
      $mainvat =  $row["vat"];
      $maintotal =  $row["total"];
      $username =  $row['username'];
      $eventdate = $row['eventdate'];
      $estimatedate = $row["estimatedate"];
      $email = $row["email"];
      $orderref = $row['orderref'];
      $postcode = $row["postcode"];
      $capacity = $row["capacity"] ;
      $chaser = $row["chaser"];
      $invoice = $row["invoice"];
  }
$strSQL = "SELECT * FROM orderdetails WHERE orderref='$orderref' AND qty AND visible='y'";
      $rs = mysql_query($strSQL);
      $map = isset($_GET['map']) ? $_GET['map'] : '';
      $id_to_delete = isset($_GET['id']) ? $_GET['id'] : '';
      $map_to_delete = isset($_GET['idmap']) ? $_GET['idmap'] : '';
      $map_all_delete = isset($_GET['deletemap']) ? $_GET['deletemap'] : '';
      $all_delete = isset($_GET['deletetodo']) ? $_GET['deletetodo'] : '';
      $date = date('Y-m-d');
      $time = date('H:i:s');
      $task = isset($_GET['task']) ? $_GET['task'] : '';
      $itemnew = isset($_GET['itemnew']) ? $_GET['itemnew'] : '';
      $qtynew = isset($_GET['qtynew']) ? $_GET['qtynew'] : '';
      $costpricenew = isset($_GET['costpricenew']) ? $_GET['costpricenew'] : '';
      $hirepricenew = isset($_GET['hirepricenew']) ? $_GET['hirepricenew'] : '';
      $totalnew = $qtynew * $hirepricenew;   
?>




<?php // DUPLICATE ORDER
$duplicateorder = isset($_GET['duplicate']) ? $_GET['duplicate'] : '';
if($duplicateorder == $orderref){
  echo "what the fuck";
    $sql="INSERT INTO custorder (username, email, postcode, comment, chaser, invoice, deleted, eventdate, estimatedate, capacity, subtotal, vat, total) SELECT username, email, postcode, comment, chaser, invoice, deleted, eventdate, estimatedate, capacity, subtotal, vat, total FROM custorder WHERE orderref='$orderref' ";
    $result=mysql_query($sql) or die("Error when tryin to delete note.");
    $orderrefnew = mysql_insert_id();
    $sqlnew="INSERT INTO orderdetails (product, qty, hireprice, costprice, total, orderref, visible) SELECT product, qty, hireprice, costprice, total, '$orderrefnew', visible FROM orderdetails WHERE orderref='$orderref' ";
    $result=mysql_query($sqlnew) or die("Error when tryin to delete note.");
    $orderref = $orderrefnew;
}
?>






<?php // UPDATE TOTALS ON ORDER
$addsubtotal = isset($_GET['addsubtotal']) ? $_GET['addsubtotal'] : '';
if($addsubtotal != ''){
  $mainsubtotal = $mainsubtotal + $addsubtotal; 
  $mainvat = $mainsubtotal * 0.2;
  $maintotal = $mainvat + $mainsubtotal;
}
$subractsubtotal = isset($_GET['subractsubtotal']) ? $_GET['subractsubtotal'] : '';
if($subractsubtotal != ''){
  $mainsubtotal = $mainsubtotal - $subractsubtotal; 
  $mainvat = $mainsubtotal * 0.2;
  $maintotal = $mainvat + $mainsubtotal;
}
mysql_query("UPDATE custorder SET subtotal='$mainsubtotal', vat='$mainvat', total='$maintotal' WHERE orderref='$orderref'");
?>






<div class="container" style="padding-top:110px;">

<ul class="admin-nav nav nav-pills pull-right" style="margin:-20px 0 20px">
  <li><a href="index.php">Estimates</a></li>
  <li><a href="chaser.php">chaser</a></li>
  <li><a href="invoices.php">Invoices</a></li>
  <li><a href="pricetable.php">Price Table</a></li>
</ul>
<ul class="admin-nav nav nav-pills pull-left" style="margin:-20px 0 20px">
  <li><a class="btn btn-warning" href="singleestimate.php?duplicate=<?php echo $orderref ?>&orderref=<?php echo $orderref ?>">Enable Editing</a></li>
</ul>

<div class="clearfix"></div>

<!-- Cust details -->
<?php 

 echo '<div></div>';
 echo "<div class=\"toprow\">";
 echo "<div class=\"row\"><div class=\"col-md-6\"><h2 style=\"margin-bottom: 0;\">" . $username . "</h2></div><div class=\"col-md-6 text-right\"><h5>Date of event:  </h5><h3>" . $eventdate . "</h3></div></div>";
 echo "<div class=\"row\"><div class=\"col-md-6\"><h3>" . $email . "</div></h3><div class=\"col-md-6 text-right\"><h5>Postcode:  </h5><h3> <span id=\"posty\">" . $postcode . "</span></h3></div></div>";
 echo "<div class=\"row\"><div class=\"col-md-6\"><h4>#" . $orderref . "   |   " . $estimatedate . "</h4></div><div class=\"col-md-6 text-right\"><h5>Capacity:  </h5><h3> " . $capacity . "</h3></div></div></div>";
 echo "<div class='row' style=\"margin-bottom: 25px;\"><div class='col-md-6'><div class=\"text-left quote-action\">";
//echo "<a href='chaser.php?orderref=" . $orderref . "''><img src='../assets/img/chasericon.svg' style=\"width:20px\"/> Email chaser"; if($chasersent != 'n'){ echo " - Sent";}echo "</a>";
//echo "<a href=\"http://midlandsmarqueehire.com/customer-estimates/MidlandsMarqueeHire-Estimate-" . $username . "-" . $registration_date . ".pdf\" /><img src='../assets/img/estimate.svg' style=\"width:20px\"/></a>";
//echo "<a href='emails/estimate.php?orderref=". $row['orderref'] . "'><img src='../assets/img/estimate-resend.svg' style=\"width:20px\" /></a>";
//echo "<a href='emails/invoice.php?orderref=" . $row['orderref'] . "'> <img src='../assets/img/invoice.svg' style=\"width:20px\"/> Send" ; if($invoicesent != 'n'){echo " - Sent";}echo "</a>";  
echo "</div>";
?>




<?php
echo "<div class=\"btn-group\" role=\"group\" aria-label=\"...\">";
echo "  <a href='emails/chaser.php?orderref=" . $orderref . "'>Chaser"; if($chaser != 'n'){ echo ' - Sent';} " </a>";
echo "  <a href='http://midlandsmarqueehire.com/customer-estimates/MidlandsMarqueeHire-Estimate-" . $username . "-" . $estimatedate . ".pdf' />estimate</a>";
echo "  <a href='emails/estimate.php?orderref=". $orderref . "'>Resend estimate</a>";
echo "  <a href='pdf/invoice-pdf.php?orderref=" . $orderref . "'>Send Invoice </a>";
//if($invoice != 'n'){echo " - Sent"};
echo "</div>";
?>




<!-- Order summary -->
<?php

echo "<div class='newestimate'>";
echo "<div class=\"row estihead\"><div class='col-md-5'><h4>Item</h4></div><div class='col-md-2'><h4>Price</h4></div><div class='col-md-2 text-center'><h4>  QTY</h4></div><div class='col-md-3'><h4>  Total</h4></div></div>" ;
 

$strSQL = "SELECT * FROM orderdetails WHERE orderref='$orderref' AND qty AND visible='y'";
while($row = mysql_fetch_array($rs)) {
      $product = $row['product'];
      $hireprice = $row["hireprice"];
      $hireqty = $row["qty"];
      $hiretotal  =$row["total"];
echo "<div class=\"row\"><div class='col-md-5'>" . $product . "</div><div class='col-md-2'>&pound;" . $hireprice . " </div><div class='col-md-2 text-center'>" . $hireqty . "</div><div class='col-md-3'>&pound;" . $hiretotal . "</div><div class='clearfix'></div></div> " ;
} 

 echo "<hr />";
 echo "<div class=\"row totalsrow\"><div class='col-md-5'> </div><div class='col-md-4 text-right'><h4>Subtotal:</h4></div><div class='col-md-3'><h4>&pound;" . $mainsubtotal . "</h4></div> <div class='clearfix'></div></div>" ;
 echo "<div class=\"row totalsrow\"><div class='col-md-5'> </div><div class='col-md-4 text-right'><h4>Vat:</h4></div><div class='col-md-3'><h4>&pound;" . $mainvat . "</h4></div> <div class='clearfix'></div></div>" ;
 echo "<div class=\"row totalsrow\"><div class='col-md-5'> </div><div class='col-md-4 text-right'><h3>Total:</h4></div><div class='col-md-3'><h3>&pound;" . $maintotal . "</h3></div> <div class='clearfix'></div></div>" ;
 echo "</div></div>";
?>



























<!-- TO DO LIST -->
<?php 

echo "<div class=\"col-md-6\"><div class=\"wrap\">";
echo '<div  class="text-right"><a href="singleestimate.php?deletetodo='. $orderref .'&orderref='. $orderref .'">Delete all</a></div>';
echo "<div class=\"task-list\"><h4>Task List</h4><ul>";

if( isset($id_to_delete) ) {
    $sql="DELETE FROM tasks WHERE id='$id_to_delete' ";
    $result=mysql_query($sql) or die("Error when tryin to delete note.");
}

if( isset($all_delete) ) {
    $sql="DELETE FROM tasks WHERE orderref='$all_delete' ";
    $result=mysql_query($sql) or die("Error when tryin to delete note.");
}

if($task != ''){
  mysql_query("INSERT INTO tasks VALUES ('', '$task', '$date', '$time' ,'', '$orderref')");
}
$strSQL = "SELECT * FROM tasks WHERE orderref='$orderref'";
   $rs = mysql_query($strSQL);
  while($row = mysql_fetch_array($rs)) {
    echo '<li><span>'. $row['task'] .'</span><a href="singleestimate.php?id='. $row['id'] .'&orderref='. $row['orderref'] .'"> <i class="fa fa-times"></i></a></li>';
    } 

?>
      </ul>
    </div>
</div>
<form class="add-new-task" autocomplete="off" method="get">
  <div class="input-group">
      <input id="task" name="task" type="text" class="form-control"  placeholder="Add a new item..." />
      <input  id="orderref" name="orderref" class="form-control" type="hidden"  value="<?php echo htmlspecialchars($orderref); ?>" />
      <div class="input-group-btn">
      <button class="submit btn btn-defualt btn-lg" type="submit"><i class="fa fa-check"></i></button>
    </div>
  </div>
</form>


</div></div>
 




<div class="row"><div class="col-md-12">
<div class='wrap balance-sheet'>

<div class="">
  <div class="row balanacetitle">
<div class="col-md-3"><h4>Item</h4></div>
<div class="col-md-1 text-center"><h4>Qty</h4></div>
<div class="col-md-1"><h4>Cost Price</h4></div>
<div class="col-md-1"><h4>Hire Price</h4></div>
<div class="col-md-1"><h4>Cost Total</h4></div>
<div class="col-md-1"><h4>Hire Total</h4></div>
<div class="col-md-1"><h4>Profit</h4></div>
<div class="col-md-1"><h4>Live / Office</h4></div>
<div class="col-md-1"><h4>delete</h4></div>
</div>


<?php 

if($itemnew != ''){
  mysql_query("INSERT INTO orderdetails VALUES ('$itemnew', '$qtynew', '$hirepricenew', '$costpricenew' ,'$totalnew', '$orderref', '', 'n')");
};

 $strSQL = "SELECT * FROM  orderdetails WHERE orderref='$orderref' AND qty AND visible in ('y','n')";
   $rs = mysql_query($strSQL);
    while($row = mysql_fetch_array($rs)) {
   $visible = $row['visible'];   
   $qty = $row['qty']; 
   $hprice = $row['hireprice'];
   $cprice = $row['costprice'];
   $htotal = $qty * $hprice; 
   $ctotal = $qty * $cprice; 
   $profit = $htotal - $ctotal; 
 echo "<div class=\"row productrow " . $row['visible'] . " \">";
 echo "<div class='col-md-3'>" . $row['product'] . "</div>";
 echo "<div class='col-md-1 text-center'>" . $row['qty'] . "</div>";
 echo "<div class='col-md-1'>&pound;" . $row['costprice'] . " </div>";
 echo "<div class='col-md-1'>&pound;" . $row['hireprice'] . " </div>";
 echo "<div class='col-md-1'>&pound;" . $ctotal . "</div>";
 echo "<div class='col-md-1'>&pound;" . $htotal . "</div>";
 echo "<div class='col-md-1'>&pound;" . $profit . "</div>";
echo "<div class='col-md-1 text-center'>";
 if($visible != 'y'){
echo "<a href=\"singleestimate.php?orderref=". $row['orderref'] ."&addtoorder=". $row['id'] ."&addsubtotal=". $htotal ."\"><i class=\"fa fa-check\"></i></a>";
 }else{
echo "<a href=\"singleestimate.php?orderref=". $row['orderref'] ."&removefromorder=". $row['id'] ."&subractsubtotal=". $htotal ."\"><i class=\"fa fa-times\"></i></a>";
 };
echo "</div>";
 echo "<div class='col-md-1 text-center'><a href=\"singleestimate.php?id=". $row['id'] ."&orderref=". $row['orderref'] ."\"> <i class=\"fa fa-trash-o\"></i></a></div></div>";

$fullctotal = $ctotal + $fullctotal;
$fullhtotal = $htotal + $fullhtotal;
$profittotal = $profit + $profittotal;
};
if($profittotal != ''){
  $sql ="UPDATE custorder SET costtotal = '$fullctotal', profittotal = '$profittotal' WHERE orderref='$orderref';";
  $result = mysql_query($sql);
}
?>  


<div class="row productrow">
<form class="" autocomplete="off" method="get">
      <input name="itemnew" type="text" class="addpaymentinput col-md-3"  placeholder="item name" />
      <input name="qtynew" type="text" class="addpaymentinput col-md-1 text-center"  placeholder="qty" />
      <input name="costpricenew" type="text" class="addpaymentinput col-md-1"  placeholder="cost price" />
      <input name="hirepricenew" type="text" class="addpaymentinput col-md-1"  placeholder="hire price" />
      <input  id="orderref" name="orderref" class="form-control" type="hidden"  value="<?php echo htmlspecialchars($orderref); ?>" />
      <div class="col-md-4 continue-add"></div>
      <div class="input-group-btn col-md-1">
      <button class="submit btn btn-primary btn-lg" type="submit"><i class="fa fa-check"></i></button>
    </div>
 </div>
</form>
 </div>


<?php
echo "<div class=\"wrap\">";
echo "<div class=\"row totalsrow\"><div class='col-md-3 text-left'><h4>Totals:</h4></div><div class='col-md-3'></div><div class='col-md-1'><h4>&pound;"  .$fullctotal.  "</h4></div><div class='col-md-1'><h4>&pound;" .$fullhtotal. "</h4></div><div class='col-md-1'><h4>&pound;" .$profittotal. "</h4></div> <div class='clearfix'></div></div>" ;
echo "</div>";
?> 

</div></div>
</div>
</div>




<!-- MAPS MAPS MAPS -->

<div class="clearfix"></div>

<div class="container" style="padding-top:50px">
  <div class="row">
<div class="col-md-6">
<div id="map" style="width: 100%;
height:423px;"></div></div>







<?php 

echo "<div class=\"col-md-6\"><div class=\"wrap\">";
echo '<div  class="text-right"><a href="singleestimate.php?deletemap='. $orderref .'&orderref='. $orderref .'">Delete all</a></div>';
echo "<div class=\"task-list\"><h4>Job Locations</h4><ul>";

if( isset($map_to_delete) ) {
    $aaa="DELETE FROM maps WHERE id='$map_to_delete' ";
    $ddd=mysql_query($aaa) or die("Error when tryin to delete note.");
}

if( isset($map_all_delete) ) {
    $fff="DELETE FROM maps WHERE orderref='$map_all_delete' ";
    $ggg=mysql_query($fff) or die("Error when tryin to delete note.");
}

//GET THE LAT LONG FROM GOOGIE
$Address = $map;
$Address = urlencode($Address);
  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
  $xml = simplexml_load_file($request_url) or die("url not loading");
  $status = $xml->status;
  if ($status=="OK") {
      $Lat = $xml->result->geometry->location->lat;
      $Lon = $xml->result->geometry->location->lng;
  };

if($map != ''){
$sendthat = "INSERT INTO maps VALUES ('$map', '$Lat', '$Lon', '$orderref', 'null')";
 $asd = mysql_query($sendthat);
}

$strSQL = "SELECT * FROM maps WHERE orderref='$orderref'";
   $rs = mysql_query($strSQL);
  while($row = mysql_fetch_array($rs)) {
    echo '<li><span class="posty">'. $row['location'] .'</span>
    <span class="hidden scrapegeo">'. $row['lat'] .','. $row['long'] .'</span>


    <a href="singleestimate.php?idmap='. $row['id'] .'&orderref='. $row['orderref'] .'"> <i class="fa fa-times"></i></a></li>';
    } 

?>
      </ul>
    </div>
</div>
<form class="add-new-task" autocomplete="off" method="get">
  <div class="input-group">
      <input id="map" name="map" type="text" class="form-control"  placeholder="add Location" />
      <input  id="orderref" name="orderref" class="form-control" type="hidden"  value="<?php echo htmlspecialchars($orderref); ?>" />
      <div class="input-group-btn">
      <button class="submit btn btn-defualt btn-lg" type="submit"><i class="fa fa-check"></i></button>
    </div>
  </div>
</form>


</div></div>

<div class="clearfix"></div>
<div class="col-md-12">
<div id="directions"></div>
</div>



</div>
</div>















<!-- FOOTER -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/footer.php'); ?>
<!-- FOOTER -->


<!-- SCRIPTS -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/scripts-admin.php'); ?>
<!-- SCRIPTS -->
<script type="text/javascript">
var end;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var bnc;

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  bnc = new google.maps.LatLng(52.956097, -1.135615);
  var mapOptions = {
    zoom:11,
    center: bnc
  }
  map = new google.maps.Map(document.getElementById('map'), mapOptions);
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('directions'));

  var marker = new google.maps.Marker({
      position: bnc,
      map: map,
      title: 'Midlands Marquee Hire'
  });


//$(".scrapegeo").each(function(index, value) { 
//  cheese = $(this).text();
//
//});

var first = $(".posty").text() + ', UK';

  end = $("#posty").text() + ', UK';
  var request = {
      origin:bnc,
      waypoints: [
      {location: first, stopover: false},
      //{location: second, stopover: false},
      ],
      destination:end,
      optimizeWaypoints: true,
      travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>


   </div>












</body>
</html>





















