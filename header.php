<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gudiya_Store
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> data-scroll-container>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="gd-header" class="site-header">
		<div class="container">
			<nav class="row">
				<div class="navigation-wrap">
					<!-- <@?php
					wp_nav_menu(
						array(
							'menu' => 'Main Menu',
							'container' => 'ul',
							'menu_class' => 'main-menu unstyled-list row'
						)
					);
					?> -->					
					<ul id="menu-main-menu" class="main-menu unstyled-list row">
						<li data-menu="shop">
							<a href="javascript:void(0)">Shop</a>
								<div class="sub-menu-wrap">								
									<ul class="unstyled-list sub-menu">
										<li><a href="/shop">Shop All</a></li>
									<?php
										$term_ids = array();
										$taxonomy     = 'product_cat';
										$orderby      = 'name';  
										$show_count   = 0;      // 1 for yes, 0 for no
										$pad_counts   = 0;      // 1 for yes, 0 for no
										$hierarchical = 1;      // 1 for yes, 0 for no  
										$title        = '';  
										$empty        = 0;

										$args = array(
											'taxonomy'     => $taxonomy,
											'orderby'      => $orderby,
											'show_count'   => $show_count,
											'pad_counts'   => $pad_counts,
											'hierarchical' => $hierarchical,
											'title_li'     => $title,
											'hide_empty'   => $empty,
										);
										$all_categories = get_categories( $args );
										foreach ($all_categories as $cat) {									
										if($cat->category_parent == 0) {									
											if(strtolower($cat->name) !== 'uncategorized'){
												$category_id = $cat->term_id;
												$term_ids[] = $cat->term_id;
												echo '<li data-id="'.$cat->term_id.'"><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a></li>';
											}

											$args2 = array(
													'taxonomy'     => $taxonomy,
													'child_of'     => 0,
													'parent'       => $category_id,
													'orderby'      => $orderby,
													'show_count'   => $show_count,
													'pad_counts'   => $pad_counts,
													'hierarchical' => $hierarchical,
													'title_li'     => $title,
													'hide_empty'   => $empty
											);
											$sub_cats = get_categories( $args2 );
											if($sub_cats) {
												foreach($sub_cats as $sub_category) {
													$term_ids[] = $sub_category->term_id;
													echo  '<li data-id="'.$sub_category->term_id.'"><a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a></li>';
												}   
											}
										}
										}
										$thumbs = array();
										foreach($term_ids as $term_id){
											$thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
											if($thumbnail_id){												
												//$thumbs[$term_id].= wp_get_attachment_url($thumbnail_id);
												$thumbs[] = wp_get_attachment_url($thumbnail_id);
											}
										}
										?>
									</ul>
									<div class="category-thumb">
										<img src="<?php echo $thumbs[0]; ?>" alt="Category Thumb">
									</div>
								</div>
						</li>
						<li><a href="/about">About</a></li>
						<li><a href="">Gudiya</a></li>
						<li><a href="/contact">Contact</a></li>
					</ul>					
				</div>	
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>
				<div class="navigation-cta">
					<ul class="unstyled-list row">
						<li>
							<a href="" data-action="search">Search 
								<svg viewBox="0 0 20 20" id="search">
									<circle fill="none" stroke-width="1.3" stroke-miterlimit="10" cx="8.35" cy="8.35" r="6.5"></circle>
									<path fill="none" stroke-width="1.3" stroke-miterlimit="10" d="M12.945 12.945l5.205 5.205"></path>
								</svg>
							</a>
						</li>
						<li>
							<a href="<?php echo home_url(); ?>/account">Account 
								<svg viewBox="0 0 20 20" id="user-account-people">
									<path fill="none" stroke-width="1.3" stroke-miterlimit="10" d="M6 5.444C6 3.481 7.377 2 10 2c2.557 0 4 1.481 4 3.444S12.613 10 10 10c-2.512 0-4-2.592-4-4.556z"></path>
									<path fill="none" stroke-width="1.3" stroke-linecap="round" stroke-miterlimit="10" d="M17.049 13.366s-1.22-.395-2.787-.761A7.056 7.056 0 0 1 10 14c-1.623 0-3.028-.546-4.192-1.411-1.601.37-2.857.777-2.857.777-.523.17-.951.759-.951 1.309V17c0 .55.45 1 1 1h14c.55 0 1-.45 1-1v-2.325c0-.55-.428-1.139-.951-1.309z"></path>
								</svg>
							</a>
						</li>
						<li>							
							<?php global $woocommerce; ?>
							<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
							<?php
								$cart_total = $woocommerce->cart->get_cart_contents_count();
								echo $cart_total; 
							?>
							<svg viewBox="0 0 20 20" id="basket-addtocart">
								<path fill="none" stroke-width="1.3" stroke-linejoin="round" stroke-miterlimit="10" d="M2.492 6l1 7H14l4-7z"></path><circle cx="4.492" cy="16.624" r="1.5"></circle>
								<circle cx="11" cy="16.624" r="1.5"></circle><path fill="none" stroke-width="1.3" stroke-linecap="round" stroke-miterlimit="10" d="M2 2h3"></path>
							</svg>
							<span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
						</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div id="search-form">
			<div class="close-search">close</div>
			<?php echo do_shortcode('[wcas-search-form]'); ?>
		</div>
	</header>	
	