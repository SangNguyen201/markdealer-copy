<?php
/**
 * @package  Mark Dealer
 * @author  Err
 * @link  https://fb.com/Error.Mouse
 * @copyright  Copyright (c) 2022, Err
 * @license  GPL-2.0+
 */

// Starts the engine (do not remove).
require_once get_template_directory() . '/lib/init.php';

// Child theme (do not remove).
define( 'CHILD_THEME_NAME', __( 'Mark Trade E', 'genesis-child' ) );
define( 'CHILD_THEME_URL', 'https://fb.com/ErrorMouse' );
define( 'CHILD_THEME_VERSION', '1.0' );

/**
 * Sets localization (do not remove).
 * @since 1.0.0
 */
add_action( 'after_setup_theme', 'genesis_child_localization_setup' );
function genesis_child_localization_setup() {
    load_child_theme_textdomain( 'genesis-child', get_stylesheet_directory() . '/languages' );
}

// Add Missing Sizes
add_filter( "litespeed_media_ignore_remote_missing_sizes", "__return_true" );

// Remove thumbnail
remove_image_size( '1536x1536' );
remove_image_size( '2048x2048' );
add_filter('intermediate_image_sizes', function($sizes) {
    return array_diff($sizes, ['medium_large','large']);
});
function remove_wc_image_sizes() {
	remove_image_size( 'woocommerce_gallery_thumbnail' );
	remove_image_size( 'woocommerce_single' );
}
add_action('init', 'remove_wc_image_sizes');

// Hien thi dashicons
function ww_load_dashicons(){
	wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons');

// Xoá kiểu hiển thị bài viết mặc định
remove_action( 'genesis_entry_header', 'genesis_do_post_format_image', 4 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
remove_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );
remove_action( 'genesis_entry_content', 'genesis_do_post_permalink', 14 );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );
remove_action( 'genesis_after_entry', 'genesis_adjacent_entry_nav' );
remove_action( 'genesis_after_entry', 'genesis_get_comments_template' );
remove_action( 'genesis_loop_else', 'genesis_do_noposts' );
remove_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

// Thêm kiểu hiển thị bài viết
add_action( 'genesis_entry_header', 'genesis_do_post_format_image', 4 );
add_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
add_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_content', 'genesis_do_post_title' );
add_action( 'genesis_entry_content', 'genesis_post_meta' );
add_action( 'genesis_entry_content', 'genesis_post_info', 12 );
add_action( 'genesis_entry_content', 'genesis_do_post_content' );
add_action( 'genesis_entry_content', 'genesis_do_post_content_nav', 12 );
add_action( 'genesis_entry_content', 'genesis_do_post_permalink', 14 );
add_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
add_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );
add_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );
add_action( 'genesis_after_entry', 'genesis_adjacent_entry_nav' );
add_action( 'genesis_after_entry', 'genesis_get_comments_template' );
add_action( 'genesis_loop_else', 'genesis_do_noposts' );
add_action( 'genesis_after_endwhile', 'genesis_posts_nav' );

// Delete entry-header in Single post
function post_image_del() {
	if ( is_single() ) {
      remove_action( 'genesis_entry_header', 'genesis_do_post_format_image', 4 );
      remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
      remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
      remove_action( 'genesis_entry_header', 'genesis_do_post_image', 8 );
   }
}
add_action ( 'genesis_before_entry' , 'post_image_del' );

/* Add meta keywords by Tags */
function meta_keywords() {
	if (is_singular('post')) {
		if (get_the_tags(get_the_ID()) != null) {
			foreach((get_the_tags()) as $tag) {
				$keywords[] = strtolower($tag->name);
			} ?>
         <meta name="keywords" content="<?php echo implode(", ", array_unique($keywords));?>" />
      <?php } 
   } else if (is_singular('product')) {
      $tags = (array) wp_get_post_terms( get_the_id(), 'product_tag', array('fields' => 'names') );
      if (!empty($tags) ){
         echo '<meta name="keywords" content="' . implode( ', ', array_merge( $tags ) ) . '" />' . "\n";
      }
   } else {
      add_filter( 'rank_math/frontend/show_keywords', '__return_true');
   }
}
add_filter('genesis_meta', 'meta_keywords');

// Block URLs from inside form on Single Line Text and Paragraph Text form fields
function custom_textarea_validation_filter($result, $tag) {  
    $type = $tag['type'];
    $name = $tag['name'];
    if($name == 'mo-ta' || $name == 'noi-dung' ) {
		$value = $_POST[$name];
		$Match_all = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]|(bit\.ly)|[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,8}/";
		if(preg_match($Match_all,$value)){
			$result->invalidate( $tag, "Bạn không thể nhập URLs vào ô này!" );
		}
    }
    return $result;
}
add_filter('wpcf7_validate_textarea','custom_textarea_validation_filter', 10, 2);
add_filter('wpcf7_validate_textarea*', 'custom_textarea_validation_filter', 10, 2);

// Đổi chữ Read More
add_filter( 'excerpt_more', 'child_read_more_link');
add_filter( 'get_the_content_more_link', 'child_read_more_link' );
add_filter( 'the_content_more_link', 'child_read_more_link' );
function child_read_more_link() { 
    return '... <a class="buttonred" href="' . get_permalink() . '" rel="nofollow"></a>';
}

// Modify breadcrumb arguments.
add_filter( 'genesis_breadcrumb_args', 'sp_breadcrumb_args' );
function sp_breadcrumb_args( $args ) {
	$args['home'] = 'Trang chủ';
	$args['sep'] = '&nbsp; &raquo; &nbsp;';
	$args['list_sep'] = ', ';
	$args['prefix'] = '<div class="breadcrumb">';
	$args['suffix'] = '</div>';
	$args['heirarchial_attachments'] = true;
	$args['heirarchial_categories'] = true;
	$args['display'] = true;
	$args['labels']['prefix'] = '';
	$args['labels']['author'] = '';
	$args['labels']['category'] = '';
	$args['labels']['tag'] = '';
	$args['labels']['date'] = '';
	$args['labels']['search'] = 'Tìm kiếm cho ';
	$args['labels']['tax'] = '';
	$args['labels']['post_type'] = '';
	$args['labels']['404'] = 'Không có kết quả: ';
return $args;
}

// Change 'Preview'
add_filter( 'genesis_prev_link_text', 'modify_previous_link_text' );
function modify_previous_link_text($text) {
        $text = 'Trang trước';
        return $text;
}
// Change 'Next'
add_filter( 'genesis_next_link_text', 'modify_next_link_text' );
function modify_next_link_text($text) {
        $text = 'Trang sau';
        return $text;
}

// Adds image sizes 75x75
add_image_size( '75x75', 75, 75, true );

// Them chu ky vao RSS
function feedContentFilter($content){
    $content .= '<p>Bài viết này thuộc quyền sở hữu của <a href="<?php echo home_url()?>" rel="dofollow"><?php echo get_bloginfo( "name" );?></a>.</p>';
   return $content;
}
function feedFilter($query){
   if ($query->is_feed) {
      add_filter('the_content', 'feedContentFilter');
   } return $query;
}
add_filter('pre_get_posts', 'feedFilter');

// 404
add_shortcode ('404_shortcode', 'my_404_shortcode');
function my_404_shortcode() {
ob_start();
?>

<style>

</style>

<div id="not-found-404">
   <main class="content">
      <article class="entry">
         <span>&#9888;</span>
        <p>Nội dung bạn đang tìm kiếm hiện không khả dụng!</p> 
      </article>
   </main>
</div>

<?php 
return ob_get_clean();
}

// Noi dung tim kiem khong co
function no_posts_text() {
   echo do_shortcode('[404_shortcode]');
}
add_filter( 'genesis_noposts_text', 'no_posts_text' );

// Chuyen huong ve trang chu khi dang xuat
function logout_redirect(){
    wp_redirect( home_url() );
  exit;
}
add_action('wp_logout','logout_redirect');

/***************************************************************************
 *** Custom Field  *********************************************************
 **************************************************************************/

// Hinh thuc
function hinh_thuc() {
   $labels = array(
           'name' => 'Hình thức',
           'singular' => 'Hình thức',
           'menu_name' => 'Hình thức'
   );
   $args = array(
           'labels'                     => $labels,
           'hierarchical'               => true,
           'public'                     => true,
           'show_ui'                    => true,
           'show_admin_column'          => true,
           'show_in_nav_menus'          => true,
           'show_tagcloud'              => true,
   );
   register_taxonomy('hinh-thuc', 'product', $args);
}
add_action( 'init', 'hinh_thuc', 0 );

// Nhom san pham
function nhom_san_pham() {
   $labels = array(
           'name' => 'Nhóm',
           'singular' => 'Nhóm',
           'menu_name' => 'Nhóm'
   );
   $args = array(
           'labels'                     => $labels,
           'hierarchical'               => true,
           'public'                     => true,
           'show_ui'                    => true,
           'show_admin_column'          => true,
           'show_in_nav_menus'          => true,
           'show_tagcloud'              => true,
   );
   register_taxonomy('nhom-san-pham', 'product', $args);
}
add_action( 'init', 'nhom_san_pham', 0 );

/***************************************************************************
 *** Woocommerce  **********************************************************
 **************************************************************************/

// Xoa ten san pham mac dinh
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

// Xoa gia san pham mac dinh
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
// Xoa mo ta san pham mac dinh
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

// Remove Add to cart
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

// An cac so 0 o cuoi gia
add_filter('formatted_woocommerce_price', function($formatted_price, $price, $decimals, $decimal_separator) {
   if (strpos($formatted_price, $decimal_separator) !== false) {
       $formatted_price = rtrim($formatted_price, '0');
       $formatted_price = rtrim($formatted_price, $decimal_separator);
   }
   return $formatted_price;
}, 10, 4);

// Doi text "San pham tuong tu"
add_filter('gettext', 'change_rp_text', 10, 3);
add_filter('ngettext', 'change_rp_text', 10, 3);
function change_rp_text($translated, $text, $domain){
     if ($text === 'Related products' && $domain === 'woocommerce') {
         $translated = esc_html__('Nhãn hiệu tương tự', $domain);
     }
     return $translated;
}

// Them dau phay vao chi phi
function them_dau_phay() {?>

   $.fn.digits_price = function() {
      return this.each(function() {
         $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
      });
      
   };
   $(".price").digits_price();

<?php }

// Gia san pham
function gia_san_pham() {?>
   <?php 
      if (get_post_meta(get_the_ID(), '_sale_price', true) == null) {?>
         <p class="price">
            <?php
               echo get_post_meta(get_the_ID(), '_regular_price', true);
               if (get_post_meta(get_the_ID(), '_price', true) == null && get_field("gia_tuy_chinh") != null ) {
                  echo get_field("gia_tuy_chinh");
               } elseif (get_post_meta(get_the_ID(), '_regular_price', true) != null && get_field("gia_tuy_chinh") != null ) {
                  echo get_woocommerce_currency_symbol() . " " . get_field("gia_tuy_chinh");
               } elseif (get_post_meta(get_the_ID(), '_regular_price', true) == null) {
                  echo "Thương lượng";
               } elseif (get_post_meta(get_the_ID(), '_regular_price', true) != null) {
                  echo get_woocommerce_currency_symbol();
               }
            ?>
         </p>
   <?php } else {?>
      <span class="del price">
         <?php echo get_post_meta(get_the_ID(), '_regular_price', true) . " ";
         if (get_post_meta(get_the_ID(), '_price', true) == null && get_field("gia_tuy_chinh") != null ) {
            echo get_field("gia_tuy_chinh");
         } elseif (get_post_meta(get_the_ID(), '_regular_price', true) != null && get_field("gia_tuy_chinh") != null ) {
            echo get_woocommerce_currency_symbol() . " " . get_field("gia_tuy_chinh");
         } elseif (get_post_meta(get_the_ID(), '_regular_price', true) == null) {
            echo "Thương lượng";
         } elseif (get_post_meta(get_the_ID(), '_regular_price', true) != null) {
            echo get_woocommerce_currency_symbol();
         }?>
      </span>
      <span class="price">
         <?php echo get_post_meta(get_the_ID(), '_sale_price', true) . " ";
         if (get_post_meta(get_the_ID(), '_price', true) == null && get_field("gia_tuy_chinh") != null ) {
            echo get_field("gia_tuy_chinh");
         } elseif (get_post_meta(get_the_ID(), '_regular_price', true) != null && get_field("gia_tuy_chinh") != null ) {
            echo get_woocommerce_currency_symbol() . " " . get_field("gia_tuy_chinh");
         } elseif (get_post_meta(get_the_ID(), '_regular_price', true) == null) {
            echo "Thương lượng";
         } elseif (get_post_meta(get_the_ID(), '_regular_price', true) != null) {
            echo get_woocommerce_currency_symbol();
         }?>
      </span>
   <?php } ?>
<?php }

// Hinh thuc
function hinh_thuc_san_pham() {?>
<div class="hinh-thuc flex">
   <?php global $post;?>
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
<?php }

// Nut MUA HANG
function mua_san_pham() {?>
   <div class="dat-mua-ngay">
      <button class="nut-dat-mua" value="<?php echo get_the_ID();?>">
         Đặt mua ngay
         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
         </svg>
      </button>
   </div>
<?php }

// Thay the thong tin san pham
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
function woocommerce_template_meta() {?>
   <div class="product_meta">
      <!-- Thong tin chi tiet -->
      <ul class="ttct">
         <!-- So dang ky -->
         <li>
            <b><?php echo get_field_object('so_dang_ky')['label'];?>:</b>
            <?php echo the_field("so_dang_ky");?>
         </li>
         <!-- Dang ky tai -->
         <li>
            <b><?php echo get_field_object('dang_ky_tai')['label'];?>:</b>
            <?php echo the_field("dang_ky_tai");?>
         </li>
         <!-- Kieu -->
         <li>
            <b><?php echo get_field_object('kieu')['label'];?>:</b>
            <?php echo the_field("kieu");?>
         </li>
         <!-- Tinh trang -->
         <li>
            <b><?php echo get_field_object('tinh_trang')['label'];?>:</b>
            <?php echo get_field_object('tinh_trang')['choices'][get_field_object('tinh_trang')['value']];?>
         </li>
      </ul>
      <!-- Hinh thuc -->
      <?php echo hinh_thuc_san_pham();?>
      <!-- Gia -->
      <?php echo gia_san_pham();?>
      <!-- Danh muc + Tu khoa-->
      <?php global $product;?>
      <!-- Danh muc -->
      <div class="danh-muc">
         <?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="dashicons dashicons-category"></span>', '', count( $product->get_category_ids() ), 'woocommerce' ); ?>
      </div>
      <!-- Tu khoa -->
      <div class="tu-khoa">
         <?php echo wc_get_product_tag_list( $product->get_id(), ' ', '<span class="dashicons dashicons-tag"></span>', '', count( $product->get_tag_ids() ), 'woocommerce' );?>
      </div>
      <!-- Nut dat mua -->
      <?php mua_san_pham();?>
   </div>
<?php }
add_filter( 'woocommerce_single_product_summary', 'woocommerce_template_meta', 40 );

// Them thong tin san pham vao LOOP
function loop_product() { ?>
   <div class="loop-product">
      <?php if (is_singular('product')) {?>
               <!-- Ten -->
               <a href="<?php echo the_permalink();?>" title="<?php echo the_title();?>">
                  <p class="name"><?php echo the_title();?></p>
               </a>
               <!-- Hinh thuc -->
               <?php echo hinh_thuc_san_pham();?>
               <!-- Gia -->
               <?php echo gia_san_pham();?>
               <!-- Excerpt -->
               <p class="excerpt">
                  <?php echo get_the_excerpt()?>
               </p>
            <?php } else {?>
               <!-- Ten -->
               <a href="<?php echo the_permalink();?>" title="<?php echo the_title();?>">
                  <h2 class="name"><?php echo the_title();?></h2>
               </a>
               <!-- Hinh thuc -->
               <?php echo hinh_thuc_san_pham();?>
               <!-- Gia -->
               <?php echo gia_san_pham();?>
               <!-- Excerpt -->
               <p class="excerpt">
                  <?php echo get_the_excerpt()?>
               </p>
		<?php } 
         // mua_san_pham();
      ?>
   </div>
<?php }
add_action( 'woocommerce_after_shop_loop_item', 'loop_product', 8 );

// After Product - New Post

function after_product_new_post(){?>
   <div id="after_product_new_post">
      <p class="title"><b>Tin tức mới nhất</b></p>
      <hr>
      <div class="flex flex_wrap">
         <?php
            $postt = new WP_Query(array(
               'post_type'       => 'post',
               'post_status'     => 'publish',
               'orderby'         => 'date',
               'order'           => 'DESC',
               'posts_per_page'  => 5));
               global $wp_query; $wp_query->in_the_loop = true;
               while ($postt->have_posts()) : $postt->the_post();?>
          <div class="post flex">
            <div class="img">
               <a href="<?php echo the_permalink();?>">
                  <?php the_post_thumbnail("thumbnail",array( "title" => get_the_title(),"alt" => get_the_title()));?>
               </a>
               </div>
            <div class="text">
               <a href="<?php echo the_permalink();?>">
                  <b><?php echo the_title();?></b>
               </a>
               <?php echo the_excerpt();?>
            </div>
          </div>
          <?php endwhile; wp_reset_postdata(); ?>
      </div>
      <div class="doc-them">
         <a href="<?php echo get_category_link(1);?>">Đọc thêm &#8594;</a>
      </div>
   </div>
<?php }
add_action( 'woocommerce_after_single_product', 'after_product_new_post',);

/***************************************************************************
 *** Header + Before Body + Load them bai viet + Widget SP noi bat + Footer
 **************************************************************************/

// Header
function style_in_header(){?>
   <div class="container">

      <div class="header flex align-items_center justify-content_space-between">
         <!-- Logo -->
         <div class="logo">
            <a href="<?php echo home_url();?>">
               <?php
                  if (have_rows('logo',2)):
                  while (have_rows('logo',2)):the_row();
                  $img = get_sub_field("logo_header");
               ?>
               <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>">
               <?php endwhile; endif;?>
            </a>
            <h1 class="site-name"><?php echo get_bloginfo();?></h1>
         </div>
         <!-- Line -->
         <div>
            <div class="line"></div>
         </div>
         <!-- Menu -->
         <div class="menu">
            <?php
               $page = get_page_by_title('Trang chủ' );
               $ids = "{$page->ID}";
               wp_nav_menu( array(
                  'menu'         => 'Main menu',
                  'container_id' => 'main-menu',
               ) );
            ?>
            <button id="button-menu">
               MENU
            </button>
         </div>
      </div>

   </div>
<?php }
add_action( 'genesis_header', 'style_in_header');

// Before Body
function style_in_start_body(){ ?>
   <div class="box-search">
      <div class="container">
         <div class="flex align-items_center justify-content_space-between flex_wrap">
            <!-- Button DANG BAN -->
            <div id="dang-ban">
               <button title="Đăng bán" alt="Đăng bán">
                  Đăng bán
                  <span class="dashicons dashicons-insert"></span>
               </button>
            </div>
            <!-- Form search -->
            <form id="form-search" class="flex align-items_center justify-content_space-between flex_wrap" action="<?php echo home_url('/'.get_post(22)->post_name);?>">
               <div class="col">
                  <input class="input" type="text" name="s" id="s-home" autocomplete="on" placeholder="Nhập nhãn hiệu cần tìm...">
               </div>
               <div class="col">
                  <select name="hinh-thuc">
                        <?php 
                           echo '<option value="hinh-thuc">-- Hình thức --</option>';
                           $terms = get_terms( array(
                              'taxonomy'      => 'hinh-thuc',
                              'hide_empty'    => true,
                              'parent'        => 152,
                              'orderby'       => 'name',
                              'order'         => 'ASC',
                           ) );  
                           foreach ($terms as $term ) { ?>
                              <option value="<?php echo $term->slug;?>"><?php echo $term->name;?></option>
                           <?php }
                        ?>
                  </select>
               </div>
               <div class="col">
                  <select name="product_cat">
                        <?php 
                           echo '<option value="loai">-- Loại --</option>';
                           $terms = get_terms( array(
                              'taxonomy'      => 'product_cat',
                              'hide_empty'    => true,
                              'parent'        => 35,
                              'orderby'       => 'name',
                              'order'         => 'ASC',
                              'exclude'       => 17,
                           ) );  
                           foreach ($terms as $term ) { ?>
                              <option data-idp="<?=$term->term_id;?>" value="<?php echo $term->slug;?>"><?php echo $term->name;?></option>
                           <?php }
                        ?>
                  </select>
               </div>
               <div class="search-bt col">
                  <input type="submit" value="Tìm kiếm">
               </div>
            </form>
         </div>
      </div>
   </div>
<?php }
add_action( 'genesis_after_header', 'style_in_start_body');

// Section 3 - Load them bai viet
function get_post_loadmore() {
   $number = isset($_POST['number']) ? (int)$_POST['number'] : 0;
   $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0;
   $getpostss = new WP_Query($args = array(
      'post_type'    => 'product',
      'post_status'  => 'publish',
      'orderby'         => 'date',
      'order'           => 'DESC',
      'posts_per_page'  => $number,
      'offset'          => $offset ));
      if ( $getpostss->have_posts() ) :
      while ($getpostss->have_posts()) : $getpostss->the_post();?>
      <div class="san-pham">
         <div class="flex justify-content_space-between">
            <!-- Anh -->
            <div class="image">
               <a href="<?php echo the_permalink();?>" title="<?php echo the_title();?>">
                  <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'thumbnail' )[0];?>" alt="<?php echo the_title();?>">
               </a>
            </div>
            <div class="text">
               <!-- Ten -->
               <h3 class="name">
                  <a href="<?php echo the_permalink();?>" title="<?php echo the_title();?>">
                     <?php echo the_title();?>
                  </a>
               </h3>
               <!-- Hinh thuc -->
               <?php echo hinh_thuc_san_pham();?>
               <!-- Gia -->
               <?php echo gia_san_pham();?>
               <!-- Excerpt -->
               <p class="excerpt">
                  <?php echo get_the_excerpt();?>
               </p>
            </div>
         </div>
      </div>
   <?php endwhile; endif; die();
}
add_action('wp_ajax_loadmore', 'get_post_loadmore');
add_action('wp_ajax_nopriv_loadmore', 'get_post_loadmore');

// Widget SP noi bat
function sp_noi_bat() {?>
   <?php if (!is_product_category('35')) {?>
   <!-- Danh muc -->
   <section id="widget_danh_muc_sp">
      <h4>Danh mục</h4>
      <ul>
         <?php
            $terms = get_terms( array(
               'taxonomy' 		=> 'product_cat',
               'hide_empty' 	=> true,
               'parent' 		=> 35,
               'orderby'       => 'name',
               'order'         => 'ASC',
         ));
         foreach ($terms as $terms) {?>
            <li>
               <a href="<?php echo esc_url(get_term_link($terms));?>">
                  <?php echo $terms->name;?>
                  <span><?php echo $terms->count;?></span>
               </a>
            </li>
         <?php } ?>
      </ul>
   </section>
   <?php } ?>
   <!-- Nhan hieu noi bat -->
   <section id="widget_sp_noi_bat">
      <?php global $product_id ;?>
      <h4>Nhãn hiệu nổi bật</h4>
      <ul>
         <?php
            $getpostss = new WP_Query($args = array(
               'post_type'		=> 'product',
               'post_status'	=> 'publish',
               'tax_query'    => array(
                  array(
                     'taxonomy'      => 'nhom-san-pham',
                     'field'         => 'term_id',
                     'terms'         => 34,
                     'operator'      => 'IN'
                  )
               ),
               'orderby' 		 => 'date',
               'order'			 => 'DESC',
               'posts_per_page'=> 5 ));
            $countp = $getpostss->found_posts;
            if ( $getpostss->have_posts() ) :
            while ($getpostss->have_posts()) : $getpostss->the_post();?>
            <li class="san-pham">
               <div class="flex justify-content_space-between">
                  <!-- Anh -->
                  <div class="image">
                     <a href="<?php echo the_permalink()?>" title="<?php echo the_title()?>">
                        <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), '75x75' )[0];?>" alt="<?php echo the_title();?>">
                     </a>
                  </div>
                  <div class="text">
                     <!-- Ten -->
                     <p class="name">
                        <a href="<?php echo the_permalink()?>" title="<?php echo the_title()?>">
                           <?php echo the_title()?>
                        </a>
                     </p>
                     <!-- Hinh thuc -->
                     <?php echo hinh_thuc_san_pham();?>
                     <!-- Gia -->
                     <?php echo gia_san_pham();?>
                  </div>
               </div>
            </li>
         <?php endwhile; endif;?>
      </ul>
   </section>
<?php }
add_action( 'genesis_before_sidebar_widget_area', 'sp_noi_bat');

// Footer
function in_footer(){ ?>
   <div class="container">
      <!-- Copyright -->
      <div class="copyright text-align_center">
         <p>
            Bản quyền thuộc IMS
            <?php echo do_shortcode('[footer_copyright]');?>
         </p>
      </div>
   </div>

   <!-- Form DANG KY BAN -->
   <div id="dang-ky-ban" class="form-dien-thong-tin flex align-items_center justify-content_center">
      <div>
         <?php echo do_shortcode('[contact-form-7 id="290" title="Đăng bán"]');?>
      </div>
   </div>

   <!-- Form DAT MUA -->
   <div id="dat-mua" class="form-dien-thong-tin flex align-items_center justify-content_center">
      <div>
         <?php echo do_shortcode('[contact-form-7 id="294" title="Đặt mua"]');?>
      </div>
   </div>

   <!-- Back to top -->
   <div id="back-to-top">
      <button title="Lên đầu trang"></button>
   </div>

<?php }
add_action( 'genesis_footer', 'in_footer');

/***************************************************************************
 *** Before Post + Meta Post  **********************************************
 **************************************************************************/

// Meta Post
function meta_post() {?>
   <div class="meta-post">
      <!-- Date -->
      <?php if (is_singular('post') || is_category('tin-tuc')) {}?>
      <span class="post-time">
         <span class="dashicons dashicons-edit-page"></span>
         <span title="(Cập nhật: <?php echo get_the_modified_date('l, G:i d.m.Y');?>)">
            <?php echo get_the_time('G:i d.m.Y');?>
         </span>
		</span>
      |
      <!-- Tac gia -->
      <span class="tac-gia">
         <span class="dashicons dashicons-businessperson"></span>
         <?php echo do_shortcode('[post_author_posts_link]');?>
      </span>
   </div>
<?php }
add_filter('genesis_post_meta', 'meta_post', 10, 1);

/***************************************************************************
 *** Meta head + Script end body *******************************************
 **************************************************************************/

// Meta head
function meta_head(){?>
   <meta name="theme-color" content="#FF0000"/>
   <!-- <link rel="apple-touch-icon" href="<?php echo get_field('apple_touch_icon',2)['url']?>"> -->
   <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/css/form-mua-ban.css">

   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-MQTY0Q5GH4"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'G-MQTY0Q5GH4');
	</script>
<?php }
add_action( 'genesis_meta', 'meta_head');

// End Body
function style_in_end_body(){ ?>

   <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/js/jquery-3.7.0.min.js"></script>
   <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri()?>/slick/slick.min.js"></script>

   <script>
      (function($) {
         $(document).ready(function() {

            /**********************
               Start Menu mobile */

               // Click open
               $("#button-menu").click(function() {
               $("#main-menu").addClass("show");
               $(".site-container").append("<div class='bg-menu'></div>");
               });

               // Close button
               $("#main-menu").append("<span class='close-menu'>&#215;</span>");
               $("#main-menu .close-menu").click(function() {
               $("#main-menu").removeClass("show");
               $(".bg-menu").remove();
               });

            /* End Menu mobile
            ********************/

            /***************
               Start FORM */

               // Close Form
               $(".form-dien-thong-tin .nut-hanh-dong p").addClass("flex align-items_center").append("<span class='close-form'>Hủy</span>");

               /**********************
                  Start DANG KY BAN */

                  // Click nut DANG KY BAN
                  $("#dang-ban button").click(function() {
                     $("#dang-ky-ban").addClass("show");
                  });

                  // Click nut HUY
                  $("#dang-ky-ban form .close-form").click(function() {
                     $("#dang-ky-ban").removeClass("show");
                  });

               /* End DANG KY BAN
               ********************/

               /*****************************
                  Start DANG KY BAN thanh cong */

                  // Tiep tuc
                  $("#dang-ky-ban form").append("<div class='dong'><span class='tiep-tuc'>&larr; Tiếp tục đăng bán</span>&nbsp<span class='dong-bt'>Đóng</span></div>");
                  $("#dang-ky-ban form .dong .tiep-tuc").click(function() {
                     $("#dang-ky-ban form").removeClass("sent");
                     $("#dang-ky-ban form").addClass("init");
                     $("#dang-ky-ban form").attr("data-status","init");
                     $("#dang-ky-ban form .wpcf7-response-output").empty();
                  });

                  // Dong
                  $("#dang-ky-ban form .dong .dong-bt").click(function() {
                     $("#dang-ky-ban").removeClass("show");
                     $("#dang-ky-ban form").removeClass("sent");
                     $("#dang-ky-ban form").addClass("init");
                     $("#dang-ky-ban form").attr("data-status","init");
                     $("#dang-ky-ban form .wpcf7-response-output").empty();
                  });

               /* End DANG KY BAN thanh cong
               ***************************/

               /******************
                  Start DAT MUA */

                  // Click nut HUY
                  $("#dat-mua form .close-form").click(function() {
                     $("#dat-mua").removeClass("show");
                     $("#dat-mua .loop-product.one").remove();
                     $("#dat-mua .ttsp-an input[name='link-san-pham']").val();
                  });

               /* End DAT MUA
               ****************/

               /*****************************
                  Start DAT MUA thanh cong */

                  $("#dat-mua form").append("<div class='dong'><span class='dong-bt'>Đóng</span></div>");
                  $("#dat-mua form .dong .dong-bt").click(function() {
                     $("#dat-mua").removeClass("show");
                     $("#dat-mua .loop-product.one").remove();
                     $("#dat-mua .ttsp-an input[name='link-san-pham']").val();
                  });

               /* End DAT MUA thanh cong
               ***************************/

            /* End FORM
            *************/

            /***************
               BACK TO TOP
            ****************/
               $("#back-to-top").click(function() {
                  $("html, body").animate({
                     scrollTop: 0
                  }, 100);
                  return false;
               });

            /******************************
               Them dau PHAY vao CHI PHI
            *******************************/
               <?php them_dau_phay();?>

            /**************************
               Start SLIDE SECTION 2 */

               setTimeout(function(){
                  $(".slide-san-pham").addClass("show");
               }, 500);
               setTimeout(function(){
                  $(".slide-san-pham").css({"overflow":"unset"});
               }, 1000); 

               $("#section-2 .slide-san-pham").slick({
                  slidesToShow: 5,
                  slidesToScroll: 1,
                  autoplay: true,
                  autoplaySpeed: 4000,
                  arrows: true,
                  responsive: [{
                     breakpoint: 992,
                     settings: {
                        slidesToShow: 4,
                     }
                  }, {
                     breakpoint: 768,
                     settings: {
                        slidesToShow: 3,
                     }
                  }, {
                     breakpoint: 576,
                     settings: {
                        slidesToShow: 1,
                  }
                  }]
               });

            /* End SLIDE SECTION 2
            ************************/

         });
      })(jQuery);
   </script>
<?php }
add_action( 'genesis_after', 'style_in_end_body');

// Them vao thu vien JQ
function dat_mua_sp_ajax() {
   wp_register_script( 'dat-mua-sp', get_stylesheet_directory_uri() . '/js/dat-mua.js', false, '1.0.0');
   wp_enqueue_script('dat-mua-sp');
   wp_localize_script( 'dat-mua-sp', 'ajax_url', admin_url('admin-ajax.php'));  
}
add_action( 'wp_enqueue_scripts','dat_mua_sp_ajax');

// Dat mua SP
add_action("wp_ajax_dat_mua_sp", "dat_mua_sp");
add_action("wp_ajax_nopriv_dat_mua_sp", "dat_mua_sp");
function dat_mua_sp() {
   $idp = $_GET['idp']; ?>
   <div class="loop-product one flex">
      <div class="image">
         <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($idp), '75x75' )[0];?>" alt="<?php echo get_the_title($idp);?>">
      </div>
      <div class="text">
         <a href="<?php echo get_permalink($idp);?>" target="_blank" title="<?php echo get_the_title($idp);?>">
            <h3 class="name">
               <?php echo get_the_title($idp);?>
            </h3>
         </a>
         <div class="hinh-thuc flex">
            <?php
               $terms = get_the_terms($idp, 'hinh-thuc');
               if ($terms != null) {
                  foreach ($terms as $term) {
                     $term_link = get_term_link($term, 'hinh-thuc');
                     echo '<a class="' . $term->slug . '" href="' . $term_link . '" target="_blank">' . $term->name . '</a>';
                  }
               }
            ?>
         </div>
         <?php
            if (get_post_meta($idp, '_sale_price', true) == null) {?>
               <p class="price">
                  <?php
                     echo get_post_meta($idp, '_regular_price', true);
                     if (get_post_meta($idp, '_price', true) == null && get_field("gia_tuy_chinh") != null ) {
                        echo get_field("gia_tuy_chinh");
                     } elseif (get_post_meta($idp, '_regular_price', true) != null && get_field("gia_tuy_chinh") != null ) {
                        echo get_woocommerce_currency_symbol() . " " . get_field("gia_tuy_chinh");
                     } elseif (get_post_meta($idp, '_regular_price', true) == null) {
                        echo "Thương lượng";
                     } elseif (get_post_meta($idp, '_regular_price', true) != null) {
                           echo get_woocommerce_currency_symbol();
                     }
                  ?>
               </p>
            <?php } else {?>
               <span class="del price">
                  <?php echo get_post_meta($idp, '_regular_price', true) . " ";
                  if (get_post_meta($idp, '_price', true) == null && get_field("gia_tuy_chinh") != null ) {
                     echo get_field("gia_tuy_chinh");
                  } elseif (get_post_meta($idp, '_regular_price', true) != null && get_field("gia_tuy_chinh") != null ) {
                     echo get_woocommerce_currency_symbol() . " " . get_field("gia_tuy_chinh");
                  } elseif (get_post_meta($idp, '_regular_price', true) == null) {
                     echo "Thương lượng";
                  } elseif (get_post_meta($idp, '_regular_price', true) != null) {
                     echo get_woocommerce_currency_symbol();}
                  ?>
               </span>
               <span class="price"><?php echo get_post_meta($idp, '_sale_price', true) . " ";
                  if (get_post_meta($idp, '_price', true) == null && get_field("gia_tuy_chinh") != null ) {
                     echo get_field("gia_tuy_chinh");
                  } elseif (get_post_meta($idp, '_regular_price', true) != null && get_field("gia_tuy_chinh") != null ) {
                     echo get_woocommerce_currency_symbol() . " " . get_field("gia_tuy_chinh");
                  } elseif (get_post_meta($idp, '_regular_price', true) == null) {
                     echo "Thương lượng";
                  } elseif (get_post_meta($idp, '_regular_price', true) != null) {
                     echo get_woocommerce_currency_symbol();}?>
               </span>
            <?php } ?>
      </div>
   </div>

   <script>
      (function($) {
         $(document).ready(function() {
            <?php them_dau_phay();?>
            $(".ttsp-an input[name='link-san-pham']").val("<?php echo get_permalink($idp);?>");
         });
      })(jQuery);
   </script>
<?php wp_die();}

// Thêm mã JS và truyền giá trị từ PHP sang JS
function um_custom_enqueue_scripts() {
   // Chèn mã JS vào trang web
   wp_enqueue_script('dat-mua', get_template_directory_uri() . '/wp-content/themes/genesis-child/js/dat-mua.js', array('jquery'), null, true);

   // Truyền giá trị từ PHP sang JS
   wp_localize_script('dat-mua', 'umCustomVars', array(
       'isLoggedIn' => is_user_logged_in(),
   ));
}
add_action('wp_enqueue_scripts', 'um_custom_enqueue_scripts');
