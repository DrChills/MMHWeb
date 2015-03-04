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
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/nav.php'); ?>
<!-- NAV -->

<!-- FOOTER -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/scripts-admin.php'); ?>
<!-- FOOTER -->


<?php
$cat = isset($_GET['cat']) ? $_GET['cat'] : '';
$identifier = isset($_GET['identifier']) ? $_GET['identifier'] : '';
$item = isset($_GET['item']) ? $_GET['item'] : '';
$desc = isset($_GET['description']) ? $_GET['description'] : '';
$costprice = isset($_GET['costprice']) ? $_GET['costprice'] : '';
$hireprice = isset($_GET['hireprice']) ? $_GET['hireprice'] : '';
$checked = isset($_GET['checked']) ? $_GET['checked'] : '';
if($item != ''){
  $sql = "INSERT INTO products (item, description, costprice, hireprice, productcode, identifier, cat, checked) VALUES ('$item', '$description', '$costprice', '$hireprice', 'null', '$identifier', '$cat', '$checked' )";
  $result = mysql_query($sql);
}
?>


<script>
$(document).ready(function() {
    $.fn.editable.defaults.mode = 'inline';     
    $('.editable').editable({
    ajaxOptions: {type: 'get'}  
   });
    $('.cat').editable({
        source: [
              {value: 'Marquee', text: 'Marquee'},
              {value: 'Funiture', text: 'Funiture'},
              {value: 'Lighting', text: 'Lighting'},
              {value: 'Flooring', text: 'Flooring'},
           ],
        ajaxOptions: {type: 'get'}    
    });

$('#checked').editable({
        source: [
              {value: 'checked', text: 'checked'},
              {value: 'notchecked', text: 'Not Checked'},
           ],
        ajaxOptions: {type: 'get'}
    });


});
</script>

<div class="container" style="padding-top:110px;">
<ul class="admin-nav nav nav-pills pull-right" style="margin:-20px 0 20px">
  <li><a href="index.php">Estimates</a></li>
  <li><a href="chaser.php">chaser</a></li>
  <li><a href="invoices.php">Invoices</a></li>
  <li><a href="pricetable.php">Price Table</a></li>
</ul>
<ul class="admin-nav nav nav-pills pull-left" style="margin:-20px 0 20px">
  <li></li>
</ul>

<div class="clearfix"></div>
<h1>Price table</h1><h3>WARNING - This effects all future prices</h3>
<p>Click on any blue text to edit. Hitting enter / return will save, clicking off will discard. There is no under button!</p>
<div class="row price-table-head">
 <!-- <div class="col-md-1">Code</div> -->
  <div class="col-md-1">Category</div>
  <div class="col-md-1">Identifier</div>
  <div class="col-md-3">Product Title</div>
  <div class="col-md-3">Description</div>
  <div class="col-md-1">base price</div>
  <div class="col-md-1">Hire Price</div>
  <div class="col-md-1">checked</div>
  <div class="col-md-1">Markup</div>
</div>


<?php
   $strSQL = "SELECT * FROM products";
   $rs = mysql_query($strSQL);
    while($row = mysql_fetch_array($rs)) {

$hprice = $row["hireprice"];
$cprice = $row["costprice"];
$markup = $hprice - $cprice;

echo "<div class=\"row price-table-row\">";
//echo "<div class=\"col-md-1\">". $row["productcode"] ."</div>";
echo "<div class=\"col-md-1\"><a href=\"#\" data-type=\"select\" data-pk=\"". $row["productcode"] ."\" data-name=\"cat\" data-url=\"includes/post.php\" class=\"cat\">". $row["cat"] ."</a></div>";
echo "<div class=\"col-md-1\"><a href=\"#\" class=\"editable\" data-type=\"text\" data-pk=\"". $row["productcode"] ."\" data-name=\"identifier\" data-url=\"includes/post.php\" >". $row["identifier"] ."</a></div>";
echo "<div class=\"col-md-3\"><a href=\"#\" class=\"editable\" data-type=\"text\" data-pk=\"". $row["productcode"] ."\" data-name=\"item\" data-url=\"includes/post.php\" >". $row["item"] ."</a></div>";
echo "<div class=\"col-md-3\"><a href=\"#\" class=\"editable\" data-type=\"text\" data-pk=\"". $row["productcode"] ."\" data-name=\"description\" data-url=\"includes/post.php\" >". $row["description"] ."</a></div>";
echo "<div class=\"col-md-1\"><a href=\"#\" class=\"editable\" data-type=\"text\" data-pk=\"". $row["productcode"] ."\" data-name=\"costprice\" data-url=\"includes/post.php\" >". $cprice ."</a></div>";
echo "<div class=\"col-md-1\"><a href=\"#\" class=\"editable\" data-type=\"text\" data-pk=\"". $row["productcode"] ."\" data-name=\"hireprice\" data-url=\"includes/post.php\" >". $hprice ."</a></div>";
echo "<div class=\"col-md-1\"><a href=\"#\" class=\"editable\" data-type=\"text\" data-pk=\"". $row["productcode"] ."\" data-name=\"checked\" data-url=\"includes/post.php\" >". $row["checked"] ."</a></div>";
echo "<div class=\"col-md-1\"><span>" . $markup . "</span></div>";
echo "</div>";
}
  ?>    
      






<div class="row price-table-row addproductrow">
 <form action="" method="GET">

<select class="col-md-1" name="cat">
  <option value="Marquee">Marquee</option>
  <option value="Funiture">Funiture</option>
  <option value="Lighting">Lighting</option>
  <option value="Flooring">Flooring</option>
</select>
<input class="col-md-1" type="text" name="identifier" placeholder="Identifier">
<input class="col-md-3" type="text" name="item" placeholder="item">
<input class="col-md-3" type="text" name="description" placeholder="description">
<input class="col-md-1" type="text" name="costprice" placeholder="cost price">
<input class="col-md-1" type="text" name="hireprice" placeholder="hire price">
<select class="col-md-1" name="checked">
  <option value="Checked">Checked</option>
  <option value="nul">null</option>
</select>
<input class="col-md-1 btn-primary" type="submit" ></div>




</form>
<div class="clearfix"></div>
</div>
<br /><br />

<!-- FOOTER -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/footer.php'); ?>
<!-- FOOTER -->

