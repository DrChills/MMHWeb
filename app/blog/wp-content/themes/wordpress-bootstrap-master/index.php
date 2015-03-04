<?php get_header(); ?>
			







			<div id="content" class="clearfix row" itemprop="mainContentOfPage">
			



				<img src="/assets/img/Marquee-top-bg.png" class="blog-top" />
				<div id="main" class="col-sm-8 clearfix" role="main">




					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article"  itemscope itemtype="http://schema.org/BlogPosting">
						
						<header>
						
							
							
							<div class="page-header"><h1 class="blog-post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></div>
							
							<p class="meta">
								
								
							
			<span class="post-date-selection"><time datetime="<?php the_time("F jS, Y"); ?>" itemprop="datePublished" pubdate><img src="/assets/img/icon-time.png" class="post-meta-icon" /><?php the_time("F jS, Y"); ?></time></span>
							
			<span class="post-comment-selection"><img src="/assets/img/icon-comments.png" class="post-meta-icon"/><?php comments_number( 'no comments', 'one comment', '% comments' ); ?>.</span>

									<!--<span class="amp">in </span><?php the_category(', '); ?>.--></p>
						<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'wpbs-featured' ); ?></a>
						</header> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_excerpt( __("Read more &raquo;","wpbootstrap") ); ?>
						</section> <!-- end article section -->
						
						<footer>
			
							<p class="tags"><?php the_tags('<span class="tags-title">' . __("Tags","wpbootstrap") . ':</span> ', ' ', ''); ?></p>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
						
						<?php page_navi(); // use the page navi function ?>
						
					<?php } else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="pager">
								<li class="previous"><?php next_posts_link(_e('&laquo; Older Entries', "wpbootstrap")) ?></li>
								<li class="next"><?php previous_posts_link(_e('Newer Entries &raquo;', "wpbootstrap")) ?></li>
							</ul>
						</nav>
					<?php } ?>		
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
			
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>