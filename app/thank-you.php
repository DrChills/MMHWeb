<!DOCTYPE html>
<html>
<head>
   <title>Thank you for contacting us</title>
<meta name="description" content="thank you for contacting Midlands Marquee Hire">

    <!-- CSS -->
   <?php include($_SERVER["DOCUMENT_ROOT"].'/template/css.php'); ?>
    <!-- CSS -->
    <!-- page only -->
    <style>#showcase {margin-top:50px;}.navbar-default .navbar-brand {color:#fff;}</style>

    <meta property='og:title' content='thank you for contacting Midlands Marquee Hire'/>

 
</head>
<body class="pull_top">


<!-- NAV -->
<?php include("./template/nav.php"); ?>
<!-- NAV -->
   
 
<div class="container">

    <div class="col-md-12">
<br />
<br />
<br />
<br />
<br />
<br />
<br />


<h1>Thank you for contacting Midlands Marquee Hire</h1>


<h2>We will get back in touch with you shortly.</h2>
<br />

<a href="http://midlandsmarqueehire.com" class="btn btn-lg btn-success">Back to the home page</a>


</div>


</div></div>



<br />
<br />
<br />



<div class="googlemap">
    <div id="map_canvas"></div>
    <div class="wash"></div>
    <div class="address">
        <ul>
            <li>Roden House</li>
            <li>Roden St</li>
            <li>Nottingham</li>
            <li>United Kingdom</li>
        </ul>
    </div>
</div>       
   


 <!-- FOOTER -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/footer.php'); ?>
<!-- FOOTER -->

 <!-- SCRIPTS -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/scripts.php'); ?>
<!-- SCRIPTS -->

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
function initialize() {
  var myLatlng = new google.maps.LatLng(52.956097, -1.135615);
  var mapOptions = {
    zoom: 7,
    center: myLatlng
  }
  var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Midlands Marquee Hire'
  });
}
google.maps.event.addDomListener(window, 'load', initialize);
    </script>
	
</body>
</html>