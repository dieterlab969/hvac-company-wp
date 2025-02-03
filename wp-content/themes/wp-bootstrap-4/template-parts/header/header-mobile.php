<div class="header__mobile d-lg-none d-xl-none">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-3">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-1') ); ?>
			</div>
			<div class="col-5 text-center">
				<a href="<?php bloginfo( 'url' ); ?>" class="header__logo__mobile">
				    <?php $logo = get_field( 'logo', 'options' ); ?>
					<img src="<?php echo $logo['url']; ?>" alt="Logo Website">
				</a>
			</div>
			<div class="col-4 text-right">
                <img src="<?php bloginfo('url'); ?>/wp-content/themes/wp-bootstrap-4/assets/images/phangia-hotline.png" alt="Hotline Number" class="hotline-img">
            </div>
		</div>
	</div>
</div>