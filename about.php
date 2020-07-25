<?php
	// Template Name: About
	get_header();
?>
<section class="about">
	<div class="container">
		<div class="row">
			<div class="about-image">
				<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>" alt="">
			</div>
			<div class="about-content">
				<h1>
					<span>
						<?php echo strip_tags(get_field('title'), '<br>'); ?>
					</span>
				</h1>
				<?php
					while(have_posts()): the_post();
						echo get_the_content();
					endwhile;
				?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>