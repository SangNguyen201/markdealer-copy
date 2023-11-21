<?php
/**
 * Template Name: Trang chủ
 */

get_header();
?>
<!-- Section 1 -->
<section id="section-1" class="section">
   <div class="container">
      <div class="flex flex_wrap align-items_center justify-content_space-between">
         <div class="text">
            <?php echo get_the_content(2);?>
         </div>
         <div class="image">
            <?php
						if (have_rows('gioi_thieu',2)):
						while (have_rows('gioi_thieu',2)):the_row();
						$img = get_sub_field("image");
					?>
            <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>" width="457" height="257">
            <?php endwhile; endif;?>
         </div>
      </div>
   </div>
</section>

<!-- Danh muc -->
<section id="danh-muc" class="section">
   <div class="container">
      <h2>Danh mục</h2>
      <div class="flex flex_wrap">
         <?php
            $terms = get_terms( array(
               'taxonomy'  => 'product_cat',
               'parent'    => 35,
               'orderby'   => 'name',
               'order'     => 'ASC',
            ));
            foreach ($terms as $term) {
               $term_link = get_term_link($term);
               $term_image_id = get_term_meta($term->term_id, 'thumbnail_id', true);
               $term_image_url = wp_get_attachment_image_src($term_image_id, 'medium')[0];
            ?>
            <a href="<?php echo esc_url($term_link);?>">
               <div>
                  <?php if($term_image_url) { ?>
                     <img src="<?php echo esc_url($term_image_url);?>" alt="<?php echo $term->name;?>">
                  <?php } ?>
               </div>
               <h3><?php echo $term->name;?></h3>
            </a>
         <?php } ?>
      </div>
   </div>
</section>

<!-- Section 2 -->
<section id="section-2" class="section">
   <div class="container">
      <div>
         <h2>Nhãn hiệu nổi bật</h2>
		  <hr>
         <div class="slide-san-pham">
            <?php $args = new WP_Query(array(
                        'post_type'=>'product',
                        'post_status'=>'publish',
                        'tax_query'             => array(
                              array(
                                    'taxonomy'      => 'nhom-san-pham',
                                    'field'         => 'term_id',
                                    'terms'         => 34,
                                    'operator'      => 'IN'
                              )
                        ),
                        'orderby' => 'modified',
                        'order' => 'DESC',
                        'posts_per_page'=> 10));
                  global $wp_query; $wp_query->in_the_loop = true;
                  while ($args->have_posts()) : $args->the_post() ?>
            <div class="san-pham">
               <div class="flex">
                  <!-- Anh -->
                  <div class="image">
                     <a href="<?php echo the_permalink()?>" title="<?php echo the_title()?>">
                        <img src="<?php echo wp_get_attachment_image_url( wc_get_product( $post->ID )->get_image_id())?>" alt="<?php echo the_title()?>" width="238" height="238">
                     </a>
                  </div>
                  <div class="text">
                     <!-- Ten -->
                     <h3 class="name">
                        <a href="<?php echo the_permalink()?>" title="<?php echo the_title()?>">
                           <?php echo the_title()?>
                        </a>
                     </h3>
                     <!-- Hinh thuc -->
                     <div class="hinh-thuc flex">
                        <?php 
                           $terms = get_the_terms( $post->ID , 'hinh-thuc' );
                           if ( $terms != null) {
                              foreach ( $terms as $term ) {
                                    $term_link = get_term_link($term, 'hinh-thuc');
                                    echo '<a class="' . $term->slug . '" href="' . $term_link . '">' . $term->name . '</a>';
                              }
                           }
                     ?>
                     </div>
                     <!-- Gia -->
                     <p class="price">
                        <?php echo get_post_meta( get_the_ID(), '_price', true);?>
                        <?php
                           if (get_post_meta(get_the_ID(), '_price', true) != null) {
                              echo get_woocommerce_currency_symbol();
                           } elseif (get_post_meta(get_the_ID(), '_price', true) == null && get_field("gia_tuy_chinh") != null ) {
                              echo get_field("gia_tuy_chinh");
                           } elseif (get_post_meta(get_the_ID(), '_price', true) == null) {
                              echo "Thương lượng";
                           }
                           ?>
                     </p>
                  </div>
               </div>
            </div>
            <?php endwhile; wp_reset_postdata();?>
         </div>
      </div>
   </div>
</section>

<!-- Section 3 -->
<section id="section-3" class="section">
   <?php global $product_id ;?>
   <div class="container">
      <h2>Dành cho bạn</h2>
      <hr>
      <div class="flex flex_wrap justify-content_space-between">
         <!-- List SP -->
         <div class="list-san-pham">
            <div id="list-san-pham" class="flex flex_wrap justify-content_space-between">
               <?php
							$getpostss = new WP_Query($args = array(
								'post_type'		=> 'product',
								'post_status'	=> 'publish',
								'orderby' 		 => 'date',
								'order'			 => 'DESC',
								'posts_per_page'=> 8 ));
							$countp = $getpostss->found_posts;
							if ( $getpostss->have_posts() ) :
							while ($getpostss->have_posts()) : $getpostss->the_post();?>
               <div class="san-pham">
                  <div class="flex justify-content_space-between">
                     <!-- Anh -->
                     <div class="image">
                        <a href="<?php echo the_permalink()?>" title="<?php echo the_title()?>">
                           <img
                              src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'thumbnail' )[0];?>"
                              alt="<?php echo the_title();?>">
                        </a>
                     </div>
                     <div class="text">
                        <!-- Ten -->
                        <h3 class="name">
                           <a href="<?php echo the_permalink()?>" title="<?php echo the_title()?>">
                              <?php echo the_title()?>
                           </a>
                        </h3>
                        <!-- Hinh thuc -->
                        <?php echo hinh_thuc_san_pham();?>
                        <!-- Gia -->
                        <?php echo gia_san_pham();?>
                        <!-- Excerpt -->
                        <p class="excerpt">
                           <?php echo wp_trim_words(get_the_excerpt(),30)?>
                        </p>
                     </div>
                  </div>
               </div>
               <?php endwhile; endif;?>
            </div>
            <div id="tai-them" class="flex align-items_center justify-content_center">
               <div id="loading">
                  <div class="loader"></div>
               </div>
               <button class="xem-them">Xem thêm</button>
            </div>
            <?php if ($countp > 1): ?>
            <script>
            (function($) {
               $(document).ready(function() {
                  var number = 8;
                  var offset = number;
                  $("#section-3 #tai-them .xem-them").click(function(event) {
                     $("#section-3 #tai-them .xem-them").hide();
                     $("#loading").show();
                     $.ajax({
                        type: "POST",
                        dataType: "html",
                        async: true,
                        url: '<?php echo admin_url('admin-ajax.php');?>',
                        data: {
                           action: "loadmore",
                           offset: offset,
                           number: number,
                        },
                        success: function(response) {
                           if (response != 'end') {
                              $("#list-san-pham").append(response);
                              offset = offset + number;
                              $("#loading").hide();
                              $("#section-3 #tai-them .xem-them").show();
                              // Them dau phay vao chi phi
                              <?php them_dau_phay();?>
                              if (offset > <?php echo $countp;?>) {
                                 $("#section-3 #tai-them .xem-them").hide();
                              }
                           }
                        }
                     });
                  });
               });
            })(jQuery);
            </script>
            <?php endif ?>
         </div>
         <!-- Widget -->
         <div class="widget-san-pham">
            <div class="banner">
               <?php
							if (have_rows('widget',2)):
							while (have_rows('widget',2)):the_row();
							$img = get_sub_field("banner");
						?>
               <img src="<?php echo $img['url']?>" alt="<?php echo $img['alt']?>">
               <?php endwhile; endif;?>
            </div>
            <div class="post-news">
               <h2>Tin tức mới nhất</h2>
               <?php
							$postt = new WP_Query(array(
								'post_type'       => 'post',
								'post_status'     => 'publish',
								'orderby'         => 'modified',
								'order'           => 'DESC',
								'posts_per_page'  => 5));
								global $wp_query; $wp_query->in_the_loop = true;
								while ($postt->have_posts()) : $postt->the_post();?>
               <a class="flex" href="<?php echo the_permalink();?>">
                  <div class="image">
                     <?php the_post_thumbnail("75x75",array( "title" => get_the_title(),"alt" => get_the_title()));?>
                  </div>
                  <div class="text">
                     <h3>
                        <?php echo the_title();?>
                     </h3>
                  </div>
               </a>
               <?php endwhile; wp_reset_postdata(); ?>
               <div class="doc-them">
                  <a href="<?php echo get_category_link(1);?>">Đọc thêm &#8594;</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?php
get_footer();