<aside id="secondary" class="widget-area col-md-3 order-md-1">
            <div id="block-3" class="widget widget_block">
                <div class="wp-container-1 wp-block-group">
                    <div class="wp-block-group__inner-container">
                        <div class="widget widget_nav_menu">
                            <div class="menu-kse-2022-container">
                                <ul id="menu-kse-2022" class="menu">
                                    <ul id="modal-menu" class="navbar-nav menu-primary-menu">
                                    <?php 
                                        $menu_name = 'menu';
                                        $menu_object = wp_get_nav_menu_object($menu_name);
                                        $menu_items = wp_get_nav_menu_items($menu_object->term_id);
                                        
                                        if(!empty($menu_items)) {
                                        foreach( $menu_items as $menu_item) {
                                            if ($menu_item->menu_item_parent == 0) {
                                                echo '
                                                    <li id="menu-item-29" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-29"><a href ="' . $menu_item->url . '">' . $menu_item->title . '</a></li>
                                                ';
                                            }
                                            }
                                        }
                                    ?>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="wp-block-heading">Technical Sponsors</h2>



<h2 class="wp-block-heading" style="font-size:22px">IEEE Vietnam Section</h2>



<figure class="wp-block-gallery aligncenter has-nested-images columns-default is-cropped wp-block-gallery-1 is-layout-flex"><div class="wp-block-image">
<figure class="aligncenter size-full is-resized"><a href="https://ieeexplore.ieee.org/Xplore/home.jsp"><img decoding="async" loading="lazy" data-id="104"  src="<?php echo get_template_directory_uri()?>/images/image-4.png" alt="" class="wp-image-104" width="229" height="81"/></a></figure></div></figure>



<h2 class="wp-block-heading">Organizers</h2>



<h4 class="wp-block-heading" style="font-size:22px">Academy of Cryptography Techniques (ACT)</h4>


<div class="wp-block-image">
<figure class="aligncenter size-full is-resized"><a href="https://actvn.edu.vn"><img decoding="async" loading="lazy" src="<?php echo get_template_directory_uri()?>/images/Logo-Hoc-Vien-Ky-Thuat-Mat-Ma-ACTVN.webp" alt="Học viện Kỹ thuật Mật mã" class="wp-image-159" width="121" height="120"/></a></figure></div>


<h4 class="wp-block-heading" style="font-size:22px">VNU University of  Engineering and Technology (VNU-UET)</h4>


<div class="wp-block-image">
<figure class="aligncenter size-full is-resized"><a href="https://uet.vnu.edu.vn/"><img decoding="async" loading="lazy" src="<?php echo get_template_directory_uri() ?>/images/uet-logo.png" alt="" class="wp-image-645" width="142" height="143" srcset="<?php echo get_template_directory_uri() ?>/images/uet-logo.png 224w, <?php echo get_template_directory_uri() ?>/images/uet-logo.png 150w" sizes="(max-width: 142px) 100vw, 142px" /></a></figure></div>


<h1 class="wp-block-heading">Endorsed by</h1>



<h4 class="wp-block-heading" style="font-size:22px">Japan Advanced Institute of Science and Technology (JAIST)</h4>


<div class="wp-block-image">
<figure class="aligncenter size-full is-resized"><img decoding="async" loading="lazy" src="<?php echo get_template_directory_uri()?>/images/logo-jaist.jpg" alt="" class="wp-image-342" width="135" height="79"/></figure></div>


<h4 class="wp-block-heading" style="font-size:22px">Vietnam Club Faculties Institutes Schools Universities of ICT</h4>


<div class="wp-block-image">
<figure class="aligncenter size-full is-resized"><img decoding="async" loading="lazy" src="<?php echo get_template_directory_uri()?>/images/fisu_logo.jpg" alt="" class="wp-image-333" width="156" height="148"/></figure></div>			<div id="block-5" class="widget widget_block">
				<div class="wp-container-7 wp-block-group">
					<div class="wp-block-group__inner-container"></div>
				</div>
			</div>
			<div id="block-6" class="widget widget_block">
				<div class="wp-container-8 wp-block-group">
					<div class="wp-block-group__inner-container"></div>
				</div>
			</div>
		</aside><!-- #secondary -->




	</div><!-- #maincolumns -->



	<footer class="site-footer pt-4 pb-2 bg-dark text-white">
		<div class="container">
			<p id="authorship">
				&copy;14th IEEE International Conference on Knowledge and Systems Engineering (KSE 2022) <span class="signature">
				</span>
				<a class="smooth float-end" href="#primary"><span>&uarr;</span>Back</a>
			</p>
		</div>
	</footer><!-- .site-footer -->
	<script src='<?php echo get_template_directory_uri()?>/assets/css/footer.css' id='bootstrap-script-js'></script>
	<script src='<?php echo get_template_directory_uri()?>/assets/js/bootstrap.bundle.min.js' id='bootstrap-script-js'></script>
	<script src='<?php echo get_template_directory_uri()?>/assets/js/ekiline.js' id='ekiline-layout-js'></script>

</body>

</html>