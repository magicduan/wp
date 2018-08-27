<?php
/**
 * The default template for displaying content
 *
 * Used for single posts.
 *
 * @package Hestia
 * @since Hestia 1.0
 */
$sidebar_layout = get_theme_mod( 'hestia_blog_sidebar_layout', 'sidebar_right' );
$wrap_class     = apply_filters( 'hestia_filter_single_post_content_classes', 'single-post-wrap col-md-8' );
?>
<div class="row">
	<?php
	if ( ( $sidebar_layout === 'sidebar-left' ) && ! is_singular( 'elementor_library' ) ) {
		get_sidebar();
	}
	?>
	<div class=" <?php echo esc_attr( $wrap_class ); ?>">
		<?php
		if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {
			do_action( 'hestia_before_single_post_article' );
			?>

			<article id="post-<?php the_ID(); ?>" class="section section-text">
				<?php

				do_action( 'hestia_before_single_post_content' );

				the_content();
				/* Display the customized field content */
				echo '<hr><table border="1" cellspacing="0" cellpadding="5"><tbody>';
				echo "<tr><td><b>所属地区：</b>".get_field('district_name') . "</td>";
				echo "<td><b>完成单位：</b>".get_field('enter-name'). "</td></tr>";
				echo "<tr><td><b>领域：</b>".get_field('tech-field')."</td>";
				echo "<td><b>成熟度：</b>".get_field('tech-maturity')."</td></tr>";
				echo "<tr><td><b>完成时间：</b>".get_field('tech-date')."</td>";
				echo "<td><b>合作方式：</b>".get_field('cowork-type')."</td></tr>";
				echo "<tr><td><b>联系人：</b>".get_field('contact-name')."</td>";
				echo "<td><b>电话：</b>".get_field('contact-tel')."</td></tr>";
				echo "<tr><td colspan='2'><b>邮件：</b>".get_field('contact-email')."</td></tr>";
				echo "</tbody></table>";
				/* added by Duan  */
				hestia_wp_link_pages(
					array(
						'before'      => '<div class="text-center"> <ul class="nav pagination pagination-primary">',
						'after'       => '</ul> </div>',
						'link_before' => '<li>',
						'link_after'  => '</li>',
					)
				);

				?>
			</article>
			<?php
			do_action( 'hestia_after_single_post_article' );
		}
		?>
	</div>
	<?php

	if ( ( $sidebar_layout === 'sidebar-right' ) && ! is_singular( 'elementor_library' ) ) {
		get_sidebar();
	}
	?>
</div>
