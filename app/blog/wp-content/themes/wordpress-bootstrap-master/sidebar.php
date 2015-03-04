				<div id="sidebar1" class="col-sm-4" role="complementary">
				<img src="/assets/img/instant-estiamte.png" style="width: 96px;
float: right;
z-index: 123;
position: relative;
margin: -65px -27px;
-webkit-transform: rotate(10deg);
-moz-transform: rotate(10deg);
-o-transform: rotate(10deg);
-ms-transform: rotate(10deg);">
<h4 class="widgettitle">Instant Estimate</h4>

                <div class="features estimate-mini">
                                           <form name="form1" method="get" action="/estimate.php">
                            <div class="input-group">
                                <input type="number" placeholder="No. of expected guests" name="customercap" value="" class="form-control" style="height: 47px;padding: 6px 12px;font-size: 18px;"> <span class="input-group-btn">
							
                                <button class="btn btn-success" type="submit" style="margin-top: 0px; font-size: 20px;padding: 10px 20px 9px; " >Go</button></span>
                            </div><!-- /input-group -->
                        </form>
                </div>
                    
                <p style="font-size: 14px;color: #888;">Just tell us how many people you are expecting and we will give you a free, instant estimate. </p>






<div id="recent-posts-added" class="widget widget_recent_entries">	

<h4 class="widgettitle">Latest posts</h4>

	 	<ul>
		<?php
		$args = array( 'numberposts' => 5 );
		$lastposts = get_posts( $args );
		foreach($lastposts as $post) : setup_postdata($post); ?>
			<li class="clearfix"> 

	<a href="<?php the_permalink(); ?>" rel="bookmark">
				<?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : ?>
<?php the_post_thumbnail('post-thumbnail'); ?>
<?php else :?>
<img width="90" height="70" src="http://blog.blinds-2go.co.uk/wp-content/uploads/2014/05/b2g-logo-1-90x70.png" class="attachment-thumbnail wp-post-image" alt="b2g-logo (1)">
<?php endif;?>
	</a>	

			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
			<span class="tab-by"> <img src="/assets/img/icon-time.png" class="post-meta-icon" /><?php the_time("F jS, Y"); ?></span>
		
			
			</li>
			
		<?php endforeach; ?>
		</ul>

</div>
	
















					<?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>

						<?php dynamic_sidebar( 'sidebar1' ); ?>



<!--
<div id="recent-posts-added" class="widget widget_recent_entries">		
	<h4 class="widgettitle">Latest posts</h4>
	<ul>		
<?php $recent_posts = wp_get_recent_posts();
foreach( $recent_posts as $recent ){
    if($recent['post_status']=="publish"){
	if ( has_post_thumbnail($recent["ID"])) {
		echo '<li>
		<a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   get_the_post_thumbnail($recent["ID"], 'thumbnail'). $recent["post_title"]. ' </a></li> ';
	}else{
		echo '<li>
		<a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a></li> ';
	}
     }
}
?></ul>
	</div>


<time datetime="<?php echo the_time('Y-m-j'); ?>" itemprop="datePublished" pubdate><?php the_time(); ?></time> <?php _e("by", "wpbootstrap"); ?> <?php the_author_posts_link(); ?> <span class="amp">&</span> <?php _e("filed under", "wpbootstrap"); ?> <?php the_category(', '); ?>
-->

					<?php else : ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->
						
						<div class="alert alert-message">
						
							<p><?php _e("Please activate some Widgets","wpbootstrap"); ?>.</p>
						
						</div>

					<?php endif; ?>

				</div>