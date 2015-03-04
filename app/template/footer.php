<footer id="footer">
        <div class="container">
            <div class="row sections">
                <div class="col-md-4 col-sm-4 col-xs-12">

<div style="display:none" class="hide">
<?php
 define('WP_USE_THEMES', false);
 require('./blog/index.php');
 query_posts('showposts=1');
?>
</div>


                    <h3 class="footer_header">
                        Recent Posts
                    </h3>
                   <div id="recent-posts-added" class="widget widget_recent_entries">    
    <ul>
    <?php
$args = array( 'numberposts' => 5 );
$lastposts = get_posts( $args );
foreach($lastposts as $post) : setup_postdata($post); ?>
      <li class="clearfix"> 

  <a href="#<?php  the_permalink(); ?>" rel="bookmark">
        <?php  if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
<?php  the_post_thumbnail('post-thumbnail'); ?>
<?php  else :?>
<img width="90" height="70" src="/images/hello" class="attachment-thumbnail wp-post-image" alt="b2g-logo (1)">
<?php  endif;?>
  </a>  

      <h2><a href="#<?php  the_permalink(); ?>"><?php  the_title(); ?></a></h2>
    
      <span class="tab-by"> <img src="/assets/img/icon-time.png" class="post-meta-icon" /><?php  the_time("F jS, Y"); ?></span>
    
      
      </li>
      
    <?php  endforeach; ?>
    </ul>

</div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <h3 class="footer_header">
                        Links
                    </h3>
                    <div class="wrapper">
                       <ul>
      <!--  <li><a href="http://midlandsmarqueehire.com/marquee-rental-fequently-asked-questions.php">FAQ</a></li> -->
        <li><a href="http://nottingham.midlandsmarqueehire.com">Nottingham</a></li>
        <li><a href="http://eastmidlands.midlandsmarqueehire.com">East Midlands</a></li>
        <li><a href="http://westmidlands.midlandsmarqueehire.com">West Midlands</a></li>



        <li><a href="http://midlandsmarqueehire.com/priceguarantee">Price Guarantee</a></li>
        <li><a href="http://blog.midlandsmarqueehire.com/">Blog</a></li>
        <li><a href="http://midlandsmarqueehire.com/termsandconditions" title="Midlands Marquee Hire terms and conditions">Terms &amp; Conditions</a></li>
        <li><a href="http://midlandsmarqueehire.com/sitemap" title="Midlands Marquee Hire Sitemap">Sitemap</a></li>
        <li><a href="http://www.alleycafe.co.uk" target="new" title="The Alley cafe">The Alley Cafe</a></li>
      </ul>


                       
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <h3 class="footer_header">
                        Contact
                    </h3>


 
      
        
       











                  <form name="sentMessage" id="contactForm"  novalidate>
     


         <div class="control-group"><div class="controls">
                <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-user"></span> </span>
                    <input type="text" class="form-control" placeholder="Full Name" id="name" required data-validation-required-message="Please enter your name" />
                </div>          
            <p class="help-block"></p>
         </div></div>   




                <div class="control-group">
                  <div class="controls">
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-envelope-o"></span></span>
            <input type="email" class="form-control" placeholder="Email" 
                            id="email" required
                       data-validation-required-message="Please enter your email" />
                   </div>
        </div>
        </div>  

               <div class="control-group">
                 <div class="controls">
                 <textarea rows="4" cols="100" class="form-control" 
                       placeholder="Message" id="message" required
               data-validation-required-message="Please enter your message" minlength="5" 
                       data-validation-minlength-message="Min 5 characters" 
                        maxlength="999" style="resize:none"></textarea>
        </div>
               </div>        
         <div class="success"> </div> <!-- For success/fail messages -->
        <button type="submit" class="btn btn-primary pull-right">Send</button><br />
          </form>
                </div>
            </div>
            <div class="row credits">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row social">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <a href="https://www.facebook.com/MidlandsMarqueeHire" class="facebook">
                                <span class="socialicons ico1">Our Facebook</span>
                            </a>
                            <a href="https://twitter.com/MidlandsMarquee" class="twitter">
                                <span class="socialicons ico2">Our Twitter</span>
                          
                            </a>
                            <a href="https://plus.google.com/+Midlandsmarqueehire" class="gplus">
                                <span class="socialicons ico3">Our Google Plus</span>
                 
                            </a>
                 <!--           <a href="#" class="pinterest">
                                <span class="socialicons ico5"></span>
                        
                            </a>-->
          
                        </div>
                    </div>
                    <div class="row copyright">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            &copy; 2009 - <?php echo date("Y") ?> Midlands Marquee Hire. All rights reserved.
                        </div>
                    </div>
                </div>            
            </div>
        </div>  
    </footer>

