
<?php include($_SERVER["DOCUMENT_ROOT"].'/admin/includes/dbconf.php'); ?>

<!DOCTYPE html>
<html>
<head>
<title>Marquee hire instant cheap estimates tailored to you</title>
<meta name="description" content="hire price list for tension marquees and event equipment">
<meta property='og:title' content='Marquee hire and equipment price list'/>




<!-- CSS -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/css.php'); ?>
<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap-editable.css" />
<!-- CSS -->
<style>.parallax-window{min-height:400px;}.parallax-mirror{height:1262px;}</style>

</head>

<body class="pull_top">
<!-- NAV -->
<?php  include($_SERVER["DOCUMENT_ROOT"].'/template/nav.php'); ?>
<!-- NAV -->
<div id="business" class="home-bg estimate-bg" >
    <div class="container">
        <div class="section_header picturetitle">
           <h1>Create your own estimate</h1>
<p>Simply enter the amount of guests you will be expecting at your function.</p>
<p>We'll then fill in the items we think you'll need based on our many years of experience. Of course you can add or remove as many items as you like to create your own, personal estimate. Once you're happy, just fill in your details and click 'send us your estimate' and we'll be right in touch to go through everything with you. </p>

        </div>            
    </div>    <img alt="stretch marquee illustration" src="assets/img/Marquee-top-bg.png" class="marguee-top-bg" >

</div>



<div class="arrow"><img src="/assets/img/arrow.png" style="max-width: 97px;
margin: -20px auto -70px;
display: block;" /></div>




<div class="container">


<form id="marquee-jquery-order-form" class="jof form-horizontal" action="admin/formdbsubmit-new.php" method="get">







<div class="col-md-12 text-center guest-block" style="font-size:24px">
Expected guests: <input autofocus class="cap-form" type="number" id="cap" name="cap" min="0" max="1000" step="1"  placeholder="0" class=" " value="<?php echo $_GET['customercap']; ?>"/>
</div>

<div class="clearfix"></div>
<div class="option main-opt">
<div class="row title hidden-xs" >

<div class="col-md-7 col-sm-4">Equipment</div>
<div class="col-md-1 col-sm-1" style="text-align:center">Cost</div>
<div class="col-md-2 col-sm-2" style="text-align:center">QTY</div>
<div class="col-md-1 col-sm-2" style="text-align:center">Total</div>
</div>





<?php 
 $strSQL = "SELECT * FROM products";
   $rs = mysql_query($strSQL);
    while($row = mysql_fetch_array($rs)) {

echo "<div class=\"row sub-option item-product o-spinner\" data-type=\"spinner\">";
echo "<div class=\"col-md-1 col-sm-1 col-xs-12 check\">   <span class=\"mobile-subtitle\">Request:</span><input type=\"checkbox\" class=\"checkboxy\" id=\"". $row["identifier"]."check\" ". $row["checked"]."></div>";
echo "<div class=\"col-md-3 col-sm-3 col-xs-12 equipment\"><span class=\"mobile-subtitle\">Item:</span>" . $row["item"] . "</div>";
echo "<div class=\"col-md-3 col-sm-3 col-xs-12 info-font\"><span class=\"mobile-subtitle\">Info:</span>" . $row["description"] . "</div>";
echo "<div class=\"col-md-1 col-sm-1 col-xs-12 set-price\"><span class=\"mobile-subtitle\">Cost:</span>&pound; " . $row["hireprice"] . "</div>";
echo "<div class=\"col-md-2 col-sm-2 col-xs-12 qty-spin\"><span class=\"mobile-subtitle\">QTY:</span><input disabled class=\"disableme\" type=\"number\" id=\"f". $row["identifier"] ."\" name=\"f". $row["identifier"] ."\"  placeholder=\"0\" min=\"0\" max=\"10000\" step=\"1\" data-cost=\"". $row["hireprice"] ."\" /></div>";
echo "<div class=\"col-md-1 col-sm-1 col-xs-12 itemtotal\"><span class=\"mobile-subtitle\">Total:</span></div>";
echo "<div class=\"col-md-1 col-sm-1 col-xs-12 hidden-xs helpdiv\"><a data-toggle=\"modal\" data-target=\"#". $row["identifier"]."Modal\"><span class=\"glyphicon glyphicon-question-sign\"></span></a></div>";
echo "</div>";
echo "<div class='modal fade' id='".$row['identifier']."Modal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' data-remote='/assets/modal/". $row["identifier"] ."modal.php'><div class='modal-dialog'><div class='modal-content'></div></div></div>";
}

?>





<div class="col-md-12 total-here pull-right">
    
</div>

<!--</fieldset>-->

<hr />

<div class="clearfix"></div>

<div class="col-md-12 send-est">
<div class="row">

<h2>Send us your estimate:</h2>
<p>Send us your estimate and we'll be right in touch to discuss your needs.</p>


<div style="margin:0 -20px!important">
<div class="col-md-3 "><div class="form-group">
<p><strong style="display:block">Name: </strong><input class="form-control" type="text" id="ften" name="ften" required/></p>
</div></div>


<div class="col-md-3 " data-type="text"><div class="form-group">
<p><strong style="display:block">Email: </strong><input  class="form-control" type="email" id="feleven" name="feleven" required /></p>
</div></div>

<div class="col-md-3" ><div class="input-group date"><div class="form-group">
<p><strong style="display:block;font-size:16px">Date of event: </strong><input name="fthirteen" id="fthirteen" class="form-control" type="text" required><span class="input-group-addon cal-addon "><i class="glyphicon glyphicon-th"></i></span></p>
</div></div></div>


<div class="col-md-3" ><div class="form-group">
<p><strong style="display:block">Postcode of event: </strong><input class="form-control" size="16" type="text" id="ffourteen" name="ffourteen" required/> </p>
</div></div>
</div>








</div> 
<!--
<div class="col-md-12 sub-option o-4 o-textarea" data-type="textarea">
<p><strong>Comments: </strong>
<textarea name="ftwelve" id="ftweleve" rows="5" class=" "></textarea></p>
</div>-->
<p class="text-right">Just click here and we'll be in touch! <img src="/assets/img/arrow2.png" style="max-width:97px" /><input class="btn-lg submit-btn submit btn btn-primary " type="submit" value="Send us your estimate"></p>
</div>
</div>
<div class="col-md-6" style="display:none">
 <ul>
    <li><h3>Delivery and Set up included</h3></li>
    <li><h3>Complementary Site visit</h3></li>
    <li><h3></h3></li>
    <li><h3>Only 10% deposits required</h3></li>
    <li><h3>Just fill in the form and we will get back to you</h3></li>
  </ul> 
</div> 
</div>
</div>
</div>
</form>
</div> 
<!-- FOOTER -->
<?php  include($_SERVER["DOCUMENT_ROOT"].'/template/footer.php'); ?>
<!-- FOOTER -->

<?php  include($_SERVER["DOCUMENT_ROOT"].'/template/scripts.php'); ?>

<script>$('.input-group.date').datepicker({
    startView: 2,
    orientation: "bottom auto",
    autoclose: true,
    todayHighlight: true
});
</script>





</body>

</html>
