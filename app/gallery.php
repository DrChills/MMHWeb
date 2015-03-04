<!DOCTYPE html>
<html>
<head>
     <title>Tension and stretch marquee Image Gallery</title>

  <meta name="description" content="beautiful images of stretch, tension, frame and bigtop marquees.">
  <style>.testimonial, .testimonialt {margin:0!important;}</style>
  <link rel="canonical" href="http://midlandsmarqueehire.com/tension-and-stretch-marquee-gallery" />
<!-- CSS -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/css.php'); ?>
<!-- CSS -->
 
   <meta property='og:title' content='Midlands Marquee Hire - tension and stretch marquee Image Gallery'/>


</head>
<body class="pull_top">



<style>

.gallery-spacing {border-radius: 3px;
border: 1px solid #aaa;
margin-bottom: 40px;
border-top: 10px solid white;
border-left: 10px solid white;
border-right: 10px solid white;
border-bottom: 50px solid white;
box-shadow: 1px 4px 3px #eee, 0px 0px 1px #444;}
.imagetitle {margin:-80px 10px 80px;display:block;height:0px;}



.zoomed {position: fixed;
top: 10vh;
left:50%;
z-index: 100;
width:100%;
height:auto;
max-width: 90vw;
max-height:90vh;}














@media screen and (min-width: 1px) and (max-width: 600px){
    #grid[data-columns]::before {
        content: '1 .col-xs-12';
    }
}
@media screen and (min-width: 601px) and (max-width: 767px){
    #grid[data-columns]::before {
        content: '2 .col-xs-6';
    }
}
@media screen and (min-width:768px) and (max-width: 9999px){
    #grid[data-columns]::before {
        content: '3 .col-sm-4';
    }
}

</style>









  <!-- NAV -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/nav.php'); ?>
<!-- NAV -->


 <div id="showcase">
        <div class="container ekko">
            <div class="section_header">
                <h1>Stretch marquee gallery</h1>
            </div>  
<!-- New style -->
            <div id="grid" class="row" data-columns> 
                <img class="gallery-spacing" alt="" title="Front profile of open sided 10m x 15m, Aug 2014" src="assets/img/gallery/wedding_dinner_marquee.jpg">
                <img class="gallery-spacing" alt="" title="Side profile of open sided 10m x 15m, Aug 2014" src="assets/img/gallery/hourbour_wedding_marquee.jpg">
                <img class="gallery-spacing" alt="" title="Main Opening, June 2012" src="assets/img/gallery/hunkered_down.jpg">

                <img class="gallery-spacing" alt="" title="Wedding in Derbyshire, 2014" src="assets/img/369HJs0770.jpg">
                <img class="gallery-spacing" alt="" title="Celebrations in full swing, 2014" src="assets/img/491HJs1043.jpg">
                <img class="gallery-spacing" alt="" title="Guest gathering at wedding reception, 2014" src="assets/img/356HJd0276.jpg">
                <img class="gallery-spacing" alt="" title="Table layout for wedding, 2014" src="assets/img/326HJs0700.jpg">

                <img class="gallery-spacing" alt="" title="Detonate Festival bar setup, Aug 2014" src="assets/img/party-festival-2.jpg">
                <img class="gallery-spacing" alt="" title="Guest walking to marquee, Aug 2014" src="assets/img/325HJs0706.jpg">



                <img class="gallery-spacing" alt="" title="Wedding in Henley in Arden, Aug 2014" src="assets/img/IMG_2320.jpg">
                <img class="gallery-spacing" alt="" title="Wedding in Henley in Arden, Aug 2014" src="assets/img/IMG_2305.jpg">
                <img class="gallery-spacing" alt="" title="Wedding in Henley in Arden, Aug 2014" src="assets/img/IMG_2319.jpg">


      <!--      <img class="gallery-spacing" alt="" title="Front profile of open sided 10m x 15m, Aug 2014" src="assets/img/gallery/beautiful_day_marquee.jpg">
                <img class="gallery-spacing" alt="" title="Nighttime wedding, July 2011" src="assets/img/gallery/wedding_marquee.jpg">
                <img class="gallery-spacing" alt="" title="Nighttime wedding evening meal, July 2011" src="assets/img/gallery/nighttime_marquee.jpg">
                <img class="gallery-spacing" alt="" title="Business lunch, Sept 2013" src="assets/img/gallery/daytime_barbeeque_marquee.jpg">
                <img class="gallery-spacing" alt="" title="" src="assets/img/gallery/fairy_light_marquee.jpg">
                <img class="gallery-spacing" alt="" title="" src="assets/img/gallery/beautiful_edge_marquee.jpg"> -->
            </div>
            <div class="clearfix"></div>
        </div>
 </div> 
               
           


<!-- NAV -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/testimonial1.php'); ?>
<!-- NAV -->

   

 <!-- FOOTER -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/footer.php'); ?>
<!-- FOOTER -->

 <!-- SCRIPTS -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/template/scripts.php'); ?>
<!-- SCRIPTS -->


<div class="overlay"></div>

<script>
// Stop carousel
$('.carousel').carousel({
 interval: 6000
});
</script>

<script type="text/javascript">
$('.gallery-spacing').each(function() {
    var title = $(this).attr('title') ;  
    $(this).after("<span class='imagetitle'>"+ title +"</span>");
});


$('img').on('click', function(){
  $(this).toggleClass('zoomed');
    $('.overlay').toggleClass('active');
});




</script>















</body>
</html>