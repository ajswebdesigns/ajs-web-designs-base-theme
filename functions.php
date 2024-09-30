<?php
function ajs_theme_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'ajs_theme_features');

function enqueue_custom_scripts() {
    // Enqueue Alpine.js
    wp_enqueue_script('alpine-js', 'https://unpkg.com/alpinejs', array(), null, true);

    // Enqueue Alpine.js Mask
//     wp_enqueue_script('alpine-mask', 'https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// Disable the emoji's
function disable_wp_emojicons() {

    // All actions related to emojis
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    // Filter to remove TinyMCE emojis
    add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
}
add_action('init', 'disable_wp_emojicons');

// Remove TinyMCE emoji plugin
function disable_emojicons_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}


function page_banner($args = NULL) {
    // Default to the page title if no custom title is provided
    if (!isset($args['title'])) {
        $args['title'] = get_the_title(); // Retrieves the page/post title
    }

    // Default to the featured image if no custom background image is provided
    if (!isset($args['photo'])) {
        if (has_post_thumbnail()) {
            // Get the URL of the featured image
            $args['photo'] = get_the_post_thumbnail_url(null, 'full'); // Full-size image
        } else {
            // Fallback image if no featured image is set
            $args['photo'] = get_theme_file_uri('/images/rocksolid-page-hero-default.webp');
        }
    }

    // Output the HTML structure for the banner
    ?>
    <section class="relative h-[250px]">
        <img src="<?php echo esc_url($args['photo']); ?>" alt="<?php echo esc_attr($args['title']); ?>" class="absolute inset-0 w-full h-full object-cover object-top">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="container mx-auto px-4 py-10 relative flex flex-col items-center justify-center text-center h-full text-white">
            <h1 class="text-4xl md:text-5xl font-bold"><?php echo esc_html($args['title']); ?></h1>
        </div>
    </section>
    <?php
}




