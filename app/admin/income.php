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

<body class="pull_top" onLoad="init()">
<!-- NAV -->
<?php include( $_SERVER["DOCUMENT_ROOT"].'/template/nav.php'); ?>
<!-- NAV -->


<?php
$delete = isset($_GET['delete']) ? $_GET['delete'] : '';
if( isset($delete) ) {
    $sql="UPDATE custorder SET deleted='y' WHERE orderref='$delete'";
    //$strSQL = "SELECT * FROM users WHERE orderref=" . $_GET["orderref"];
    $result=mysql_query($sql) or die("Error when tryin to delete note.");
}

$deleteno = isset($_GET['deleteno']) ? $_GET['deleteno'] : '';
if( isset($deleteno) ) {
    $sql="UPDATE custorder SET deleted='n' WHERE orderref='$deleteno'";
    //$strSQL = "SELECT * FROM users WHERE orderref=" . $_GET["orderref"];
    $result=mysql_query($sql) or die("Error when tryin to delete note.");
}?>





<div class="container" style="padding-top:130px">

<!-- Nav tabs -->
<ul class="admin-nav nav nav-pills pull-right" style="margin:-20px 0 20px">
  <li><a href="index.php">Estimates</a></li>
  <li><a href="chaser.php">chaser</a></li>
  <li><a href="invoices.php">Invoices</a></li>
  <li><a href="pricetable.php">Price Table</a></li>
</ul>
<ul class="admin-nav nav nav-pills pull-left" style="margin:-20px 0 20px">
 
</ul>

<div class="clearfix"></div>
<div class="row">
  <div class="col-md-8">
<h1>Invoices</h1>
</div>
<div class="col-md-4 pull-right"> 

<div class="row">
  <div class="col-md-12"><a class="filter-cancel pull-right">Clear Search</a></div>
  <div class="col-md-12"> <form id="search" action="" method="post"> 
  <div class="input-group">
 <input type="text" class="form-control" placeholder="Search" name="term" />
 <div class="input-group-btn" >
<button class="btn btn-default" type="submit" style="border: 1px solid #ccc;padding: 8px 12px 4px;"><i class="glyphicon glyphicon-search"></i> </button> 
</div>
 </div>
</form></div>
</div>



   
 </div>        </div>
 <div class="row">

<div class="clearfix"></div>        <div class="">
          <div class="portlet light">
        
            <div class="portlet-body">
              <div class="table-container">
                   
                <div class="table-scrollable"><table class="table table-striped table-bordered table-hover dataTable no-footer" id="datatable_orders" aria-describedby="datatable_orders_info" role="grid">
                
                <thead>
                  <tr>
               <th width="5%" class="sorting_asc" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Order&amp;nbsp;#
                  : activate to sort column ascending" aria-sort="ascending">
                     Order&nbsp;#
                  </th><th width="15%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Purchased&amp;nbsp;On
                  : activate to sort column ascending">
                     Date of Events&nbsp;
                  </th><th width="15%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Customer
                  : activate to sort column ascending">
                     Customer
                  </th><th width="10%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Ship&amp;nbsp;To
                  : activate to sort column ascending">
                     Cost to us
                  </th><th width="10%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Base&amp;nbsp;Price
                  : activate to sort column ascending">
                    Cost to cust
                  </th><th width="10%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Purchased&amp;nbsp;Price
                  : activate to sort column ascending">
                    Vat
                  </th><th width="10%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Status
                  : activate to sort column ascending">
                     total paid
                  </th><th width="10%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Actions
                  : activate to sort column ascending">
                     Profit ( - Vat)
                  </th><th width="10%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Actions
                  : activate to sort column ascending">
                     View
                  </th><th width="10%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Actions
                  : activate to sort column ascending">
                     Delete
                  </th></tr>
               
               
                </thead>
<tbody>

<?php


if (!empty($_REQUEST['term'])) {
$term = mysql_real_escape_string($_REQUEST['term']);     
$sql = "SELECT * FROM custorder WHERE invoice='y' AND CONCAT_WS('|',`username`,`orderref`,`costtotal`,`eventdate`) LIKE '%".$term."%'"; 
$r_query = mysql_query($sql); 
while ($row = mysql_fetch_array($r_query)){  
 $checkdelete = $row["deleted"];
    echo "<tr role='row' class='odd delete".  $row['deleted'] . "'>";
    echo "<td class='text-center'>". $row['orderref'] . "</td>";
    echo "<td>" . $row["eventdate"] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>&pound;" . $row["costtotal"] . "</td>";
    echo "<td>&pound;" . $row["subtotal"] . "</td>";
    echo "<td>&pound;" . $row["vat"] . "</td>";    
    echo "<td>&pound;" . $row["total"] . "</td>";
    echo "<td>&pound;" . $row["profittotal"] . "</td>";

    echo "<td><a href='singleestimate.php?orderref=" . $row['orderref'] . "'><i class='fa fa-search'></i> View</a></td>";
    echo "<td class='text-center'>";
    if($checkdelete != 'y'){ echo '<a href="index.php?delete='. $row['orderref'] .' "> <i class="fa fa-times"></i></a></td>';} 
    else { echo '<a href="index.php?deleteno='. $row['orderref'] .' "> <i class="fa fa-check"></i></a></td>';}
    echo "</tr>";
}
}
else {

  $strSQL = "SELECT * FROM custorder WHERE invoice='y'";
   $rs = mysql_query($strSQL);
  
  while($row = mysql_fetch_array($rs)) {
    $checkdelete = $row["deleted"];
    echo "<tr role='row'  class='odd delete".  $row['deleted'] . "'>";
    echo "<td class='text-center'>". $row['orderref'] . "</td>";
    echo "<td>" . $row["eventdate"] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>&pound;" . $row["costtotal"] . "</td>";
    echo "<td>&pound;" . $row["subtotal"] . "</td>";
    echo "<td>&pound;" . $row["vat"] . "</td>";
    echo "<td>&pound;" . $row["total"] . "</td>";
    echo "<td>&pound;" . $row["profittotal"] . "</td>";

    echo "<td><a href='singleestimate.php?orderref=" . $row['orderref'] . "'><i class='fa fa-search'></i> View</a></td>";
    echo "<td class='text-center'>";
    if($checkdelete != 'y'){ echo '<a href="index.php?delete='. $row['orderref'] .' "> <i class="fa fa-times"></i></a></td>';} 
    else { echo '<a href="index.php?deleteno='. $row['orderref'] .' "> <i class="fa fa-check"></i></a></td>';}
    echo "</tr>";
    }
  }
?>




</tbody></table>      
               
                 
                  
                </div>
              </div>
            </div><div class="show-del pull-right btn-warning btn-lg">Show deleted</div>
            <div class="clearfix"></div>
          </div>
         
        </div>
      </div>

<div class="row">    
  <canvas id="myChart" style="width:100%; height:400px; background:white; padding:20px"></canvas>
</div>


</div>    
   </div>



<!-- FOOTER -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/footer.php'); ?>
<!-- FOOTER -->
<!-- SCRIPTS -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/scripts-admin.php'); ?>
<!-- SCRIPTS -->


<script>// Get context with jQuery - using jQuery's .get() method.
 window.onLoad = function() {
                init();
            };










            function init() {
                var ctx = $("#myChart").get(0).getContext("2d");

                var data = {
                    labels: <?php eventdates(); ?>,
                    datasets: [
                        {
                            fillColor: "rgba(151,187,205,0)",
                            strokeColor: "rgba(151,187,205,0.5)",
                            pointColor: "rgba(151,187,205,0.5)",
                            pointStrokeColor: "#fff",
                            data: <?php takings(); ?>
                        },
                        {
                            fillColor: "rgba(250,0,0,0)",
                            strokeColor: "rgba(250,0,0,1)",
                            pointColor: "rgba(250,0,0,1)",
                            pointStrokeColor: "#fff",
                            data: <?php cost(); ?>
                        },
                        {
                            fillColor: "rgba(50, 255, 22,0)",
                            strokeColor: "rgba(50, 255, 22,1)",
                            pointColor: "rgba(50, 255, 22,1)",
                            pointStrokeColor: "#fff",
                            data: <?php profit(); ?>
                        },
                        
                    ]
                }

                var myNewChart = new Chart(ctx).Line(data, { bezierCurve: true});
                
            }
</script><!-- SCRIPTS -->



</body>
</html>


<?php 
function cost(){
  $prefix = '';
  $sql = "SELECT * FROM custorder WHERE invoice='y'"; 
  $r_query = mysql_query($sql); 
  echo '[';
  while ($row = mysql_fetch_array($r_query)){ echo $prefix . $row['costtotal'] . ''; $prefix = ",\n"; }
  echo ']';
}
function profit(){
  $prefix = '';
  $sql = "SELECT * FROM custorder WHERE invoice='y'"; 
  $r_query = mysql_query($sql); 
  echo '[';
  while ($row = mysql_fetch_array($r_query)){ echo $prefix . $row['profittotal'] . ''; $prefix = ",\n"; }
  echo ']';
}
function takings(){
  $prefix = '';
  $sql = "SELECT * FROM custorder WHERE invoice='y'"; 
  $r_query = mysql_query($sql); 
  echo '[';
  while ($row = mysql_fetch_array($r_query)){ echo $prefix . $row['total'] . ''; $prefix = ",\n"; }
  echo ']';
}
function eventdates(){
  $prefix = '';
  $sql = "SELECT * FROM custorder WHERE invoice='y' ORDER BY eventdate "; 
  $r_query = mysql_query($sql); 
  echo '[';
  while ($row = mysql_fetch_array($r_query)){ echo $prefix . "\"" . $row['eventdate'] . '"'; $prefix = ",\n"; }
  echo ']';
}

eventdates();
?>
