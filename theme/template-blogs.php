<?php
/*
Template name: All Blogs

*/

get_header();

?>

<div class="wellness-blog-block">

	<div class="block-wrap">
		<div class="wellness-blog_post">
        <div class="wrap-wellness-blogs-post">

			<?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
				'post_type' => 'united-wellness',
				'orderby' => 'date',
                'order' => 'DESC',
				'posts_per_page' => 8,
				'taxonomy' => 'category',
                'paged' => $paged,
			);

			$the_query  = new WP_Query( $args );
            $total_pages = $the_query->max_num_pages;


			if ( $the_query->have_posts() ){
			$the_query->the_post();
			foreach ( $the_query->posts as $post ) {

				$post_slug = $post->post_name;
                $date = date("d M, Y",strtotime($post->post_date));

				?>

				<div class="wellness-blog">

                <div class="wrap-featured-image"><?php echo get_the_post_thumbnail( $post->ID ); ?></div>

					<div class="content_wrap">
                        <div class="wrap-date-title">
                            <h1 class="post_title"><?php echo $post->post_title ?></h1>
                            <div class="date"><?php echo $date ?></div>
                        </div>
                        <div class="description">
						<?php
                                        $content = get_the_content();
                                        echo substr($content, 0, 110). ' ';
                                    ?>
						</div>
                        <div class="btn-wrap">
							<div class="shadow"></div>
                            <a class="button" href="<?php echo get_site_url() . "/wellness//" . $post->post_name ?>">Our Therapist </a>
                        </div>
					</div>

				</div>

			<?php } ?>

            </div>
            <div class="pagination">
                    <?php
                        echo "<div class='fz-pagination'>" . paginate_links(array(
                            'total' => $the_query->max_num_pages,
                            'prev_text' => __('<div class="preious-page">
                            <svg width="26" height="13" viewBox="0 0 26 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.24662 7.1853C10.2547 8.05408 11.2547 8.92287 12.2628 9.79165C12.6152 10.1031 12.984 10.3982 13.3283 10.7178C13.6971 11.0538 13.7299 11.603 13.4266 11.9554C13.107 12.3242 12.5496 12.3816 12.1644 12.0456C9.93509 10.1359 7.72215 8.20981 5.49282 6.29193C5.47643 6.27554 5.46823 6.25915 5.44364 6.22636C5.47643 6.18538 5.50921 6.1362 5.55839 6.10342C7.73854 4.21832 9.92689 2.33323 12.107 0.456327C12.4595 0.153073 12.8611 0.112093 13.2053 0.316995C13.5332 0.5137 13.7135 0.89072 13.5987 1.26774C13.5332 1.48084 13.3856 1.68574 13.2135 1.83327C11.9841 2.91515 10.7383 3.98064 9.50069 5.04613C9.41873 5.11989 9.33677 5.19366 9.18105 5.33299C9.38595 5.33299 9.51709 5.33299 9.64003 5.33299C14.6806 5.33299 19.7294 5.33299 24.77 5.33299C24.9339 5.33299 25.0978 5.33299 25.2617 5.35758C25.7043 5.43134 26.0158 5.82475 25.9994 6.25095C25.983 6.68534 25.647 7.04597 25.2126 7.09515C25.0814 7.11154 24.9503 7.11154 24.811 7.11154C19.7458 7.11154 14.6806 7.11154 9.62364 7.11154C9.50069 7.11154 9.38595 7.11154 9.26301 7.11154C9.26301 7.13612 9.25481 7.16071 9.24662 7.1853Z" fill="url(#paint0_linear_1669_1364)"/>
                            <path d="M3.35393 6.22603C4.45221 7.17677 5.5177 8.09473 6.59138 9.02089C7.21428 9.56183 7.84538 10.1028 8.46828 10.6437C8.91087 11.0289 8.97644 11.5863 8.6322 11.9715C8.28797 12.3649 7.74703 12.3731 7.29624 11.9879C5.13248 10.1274 2.97691 8.26685 0.821347 6.39815C0.763974 6.34897 0.714799 6.29979 0.600054 6.19325C0.682015 6.14407 0.763974 6.11948 0.821347 6.06211C2.97691 4.2098 5.12429 2.34929 7.27985 0.505173C7.41918 0.382232 7.5995 0.275683 7.77981 0.226507C8.18142 0.119958 8.57483 0.316664 8.75514 0.677291C8.93546 1.03792 8.86169 1.47231 8.53385 1.75917C7.88636 2.3329 7.22248 2.89842 6.56679 3.46395C5.5013 4.36552 4.44401 5.28348 3.35393 6.22603Z" fill="black"/>
                            <defs>
                            <linearGradient id="paint0_linear_1669_1364" x1="9.94307" y1="6.78808" x2="26.0497" y2="6.78808" gradientUnits="userSpaceOnUse">
                            <stop/>
                            <stop offset="0.921569" stop-opacity="0"/>
                            </linearGradient>
                            </defs>
                            </svg>
                            </div>'),
                            'next_text' => __('<div class="next-page">
                            <svg width="26" height="13" viewBox="0 0 26 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.7534 5.27637C15.7453 4.40758 14.7453 3.5388 13.7372 2.67002C13.3848 2.35857 13.016 2.06351 12.6717 1.74386C12.3029 1.40782 12.2701 0.858686 12.5734 0.506255C12.893 0.137431 13.4504 0.0800589 13.8356 0.416098C16.0649 2.32578 18.2779 4.25186 20.5072 6.16974C20.5236 6.18613 20.5318 6.20252 20.5564 6.23531C20.5236 6.27629 20.4908 6.32546 20.4416 6.35825C18.2615 8.24334 16.0731 10.1284 13.893 12.0053C13.5405 12.3086 13.1389 12.3496 12.7947 12.1447C12.4668 11.948 12.2865 11.5709 12.4013 11.1939C12.4668 10.9808 12.6144 10.7759 12.7865 10.6284C14.0159 9.54652 15.2617 8.48103 16.4993 7.41554C16.5813 7.34178 16.6632 7.26801 16.819 7.12868C16.6141 7.12868 16.4829 7.12868 16.36 7.12868C11.3194 7.12868 6.27061 7.12868 1.23003 7.12868C1.06611 7.12868 0.902185 7.12868 0.738264 7.10409C0.295676 7.03033 -0.0157743 6.63692 0.000617814 6.21072C0.01701 5.77633 0.353049 5.4157 0.78744 5.36652C0.918578 5.35013 1.04971 5.35013 1.18905 5.35013C6.25422 5.35013 11.3194 5.35013 16.3764 5.35013C16.4993 5.35013 16.6141 5.35013 16.737 5.35013C16.737 5.32554 16.7452 5.30096 16.7534 5.27637Z" fill="url(#paint0_linear_1669_1355)"/>
                            <path d="M22.6461 6.23564C21.5478 5.2849 20.4823 4.36694 19.4086 3.44078C18.7857 2.89984 18.1546 2.3589 17.5317 1.81796C17.0891 1.43274 17.0236 0.875411 17.3678 0.490195C17.712 0.0967839 18.253 0.0885879 18.7038 0.473803C20.8675 2.33431 23.0231 4.19482 25.1787 6.06352C25.236 6.1127 25.2852 6.16188 25.3999 6.26842C25.318 6.3176 25.236 6.34219 25.1787 6.39956C23.0231 8.25187 20.8757 10.1124 18.7201 11.9565C18.5808 12.0794 18.4005 12.186 18.2202 12.2352C17.8186 12.3417 17.4252 12.145 17.2449 11.7844C17.0645 11.4238 17.1383 10.9894 17.4662 10.7025C18.1136 10.1288 18.7775 9.56324 19.4332 8.99772C20.4987 8.09615 21.556 7.17819 22.6461 6.23564Z" fill="black"/>
                            <defs>
                            <linearGradient id="paint0_linear_1669_1355" x1="16.0569" y1="5.67359" x2="-0.0497228" y2="5.67359" gradientUnits="userSpaceOnUse">
                            <stop/>
                            <stop offset="0.921569" stop-opacity="0"/>
                            </linearGradient>
                            </defs>
                            </svg>
                            </div>')
                        )) . "</div>";
                    ?>
                </div>
		</div>
		<?php } ?>

	</div>

</div>




<?php get_footer();?>
