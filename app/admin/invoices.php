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
                     Date of Estimate&nbsp;
                  </th><th width="15%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Customer
                  : activate to sort column ascending">
                     Customer
                  </th><th width="10%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Ship&amp;nbsp;To
                  : activate to sort column ascending">
                     Location
                  </th><th width="10%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Base&amp;nbsp;Price
                  : activate to sort column ascending">
                     Capacity
                  </th><th width="10%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Purchased&amp;nbsp;Price
                  : activate to sort column ascending">
                     Event Date
                  </th><th width="10%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Status
                  : activate to sort column ascending">
                     Total
                  </th><th width="10%" class="sorting" tabindex="0" aria-controls="datatable_orders" rowspan="1" colspan="1" aria-label="
                     Actions
                  : activate to sort column ascending">
                     View
                  </th><th width="2%" class="sorting_disabled" rowspan="1" colspan="1" aria-label="
                    
                  ">
                    Delete
                  </th></tr>
               
               
                </thead>
<tbody>

<?php


if (!empty($_REQUEST['term'])) {
$term = mysql_real_escape_string($_REQUEST['term']);     
$sql = "SELECT * FROM custorder WHERE invoice='y' AND CONCAT_WS('|',`username`,`orderref`,`postcode`,`eventdate`) LIKE '%".$term."%'"; 
$r_query = mysql_query($sql); 
while ($row = mysql_fetch_array($r_query)){  
    $checkdelete = $row["deleted"];
    echo "<tr role='row' class='odd delete".  $row['deleted'] . "'>";
    echo "<td class='text-center'>". $row['orderref'] . "</td>";
    echo "<td>" . $row["estimatedate"] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row["postcode"] . "</td>";
    echo "<td>" . $row["capacity"] . "</td>";
    echo "<td>" . $row["eventdate"] . "</td>";
    echo "<td>&pound;" . $row["total"] . "</td>";

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
    echo "<td>" . $row["estimatedate"] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row["postcode"] . "</td>";
    echo "<td>" . $row["capacity"] . "</td>";
    echo "<td>" . $row["eventdate"] . "</td>";
    echo "<td>&pound;" . $row["total"] . "</td>";

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
          </div>
         
        </div>
      </div>



</div>    
   </div>



<!-- FOOTER -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/footer.php'); ?>
<!-- FOOTER -->
<!-- Modal Massive -->

<!-- SCRIPTS -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    <script src="//midlandsmarqueehire.com/js/uncon/bootstrap.min.js"></script> 
<script>
$('.filter-cancel').click(function(){
$( "#search" ).submit();
});



$(document).ready(function() {
    $('.show-del').toggle(
        function() {
            $('.deletey').css("display" , "table-row");
        },
        function() {
            $('.deletey').css("display" , "none");
        }
    );
});





</script>



<!-- SCRIPTS -->
</body>
</html>


