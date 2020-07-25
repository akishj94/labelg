<?php
	get_header();
?>
<!-- Landing Section Ends -->
<section class="home-ent" data-scroll-section>
	<?php
		$landingContent = get_field('landing_section', 'option');
		$image = $landingContent['landing_image'];
		$title = $landingContent['title'];
		$smallTitle = $landingContent['small_title'];
		$content = $landingContent['content'];
	?>
	<div class="container">
		<div class="home-content" data-scroll data-scroll-speed="1">
			<img src="<?php echo home_url().'/wp-content/uploads/2020/07/GUDIYA text.svg'; ?>" alt="Logo Text">
			<span><?php echo $smallTitle?></span>
			<h1 class="main-title"><span>Summer Sale</span> <br><span>50% Off</span></h1>
			<button class="site-btn">
				<a href="javascript:void(0)">Shop Now</a>
			</button>
		</div>
	</div>	
	<div class="home-ld-container background-cover" style="background-image: url('<?php echo $image['url']; ?>')"></div>
</section>
<!-- Landing Section Ends -->

<!-- Main Categories -->
<section class="main-categories" data-scroll-section>
	<div class="container">
		<div class="row">
			<?php
				while(have_rows('main_categories', 'option')): the_row();
					echo '<div class="col">
						<div class="overlay-ct"></div>
						<figure class="cat-img" data-scroll data-scroll-speed="-1">
							<img src="'.get_sub_field('background_image')['url'].'" alt="Product Category Image">
						</figure>
						<div class="content">
							<h2 class="main-title">'.get_sub_field('title').'</h2>
							<button class="site-btn">
								<a href="'.get_sub_field('link')['url'].'">'.get_sub_field('link')['title'].'</a>
							</button>
						</div>
					</div>';
				endwhile;
			?>
			
		</div>
	</div>
</section>
<!-- Main Categories End -->

<!-- Featured Category -->
<section class="featured-categories" data-scroll-section>
	<div class="container">
		<div class="row">
			<?php
				while(have_rows('featured_categories', 'option')): the_row();
				echo '<div class="col">
					<div class="category-wrap">
						<figure class="cat-img" data-scroll data-scroll-speed="-1">
							<img src="'.get_sub_field('image')['url'].'" alt="Product Category Image">
						</figure>
						<div class="content">
							<h2 class="main-title-sm">'.get_sub_field('title').'</h2>
							<p>'.get_sub_field('short_description').'</p>
							<button class="site-btn">
								<a href="'.get_sub_field('link').'">Shop Now</a>
							</button>
						</div>
					</div>
				</div>';
			endwhile;
			?>						
		</div>
	</div>
</section>
<!-- Featured Category Ends -->

<!-- Featued Products -->
<section class="home-featured-products woocommerce" data-scroll-section>
	<div class="container">
		<div class="row">
			<div class="featured-title">
				<h2 class="outline-title">
					<span class="row">
						<span>Shop</span>
					</span>
					<span class="row">
						<span class="fill">Shop</span>
					</span>
					<span class="row">
						<span>Shop</span>
					</span>
				</h2>
			</div>
			<div class="home-fp-wrap">
				
			</div>
		</div>
	</div>
</section>
<!-- Featued Products Ends -->
<?php get_footer(); ?>