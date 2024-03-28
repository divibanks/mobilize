<?php
/*
Plugin Name: Mobilize
Plugin URI: https://github.com/wpcorner/mobilize
Description: Mobilize adds a swipe menu to any site, when the width is lower than 768.
Version: 3.0.6
Author: Patrick Lumumba
Author URI: https://wpcorner.co/author/patrick-l/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: mobilize

Mobilize
Copyright (C) 2014-2023 Patrick Lumumba (https://wpcorner.co/author/patrick-l/)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

register_activation_hook( __FILE__, 'mobilize_install' );

function mobilize_install() {
    add_option( 'mobilize_flavour', '#001c40' );
    add_option( 'mobilize_text_flavour', '#ffffff' );
    add_option( 'mobilize_link_flavour', '#ffffff' );
    add_option( 'mobilize_accent_flavour', '#f1be46' );
    add_option( 'mobilize_theme', 'default' );
    add_option( 'mobilize_slide_direction', 'right' );

    add_option( 'mobilize_menu_toggle', '&vellip; Quick Menu' );
    add_option( 'mobilize_menu_close', '&times; Close' );

    add_option( 'mobilize_menubar_maxwidth', 768 );

    delete_option( 'mobilize_menubar_minwidth' );
    delete_option( 'mobilize_button_flavour' );
    delete_option( 'mobilize_line_height' );
    delete_option( 'mobilize_font_size' );
    delete_option( 'mobilize_icon_size' );
    delete_option( 'mobilize_show_site_logo' );
    delete_option( 'mobilize_logo_width' );
}

register_nav_menus(
    [
        'mobilize' => __( 'Mobilize Navigation', 'mobilize' ),
    ]
);

add_action( 'admin_menu', 'mobilize_menu' );

function mobilize_menu() {
    add_options_page( __( 'Mobilize', 'mobilize' ), __( 'Mobilize', 'mobilize' ), 'manage_options', 'mobilize_options', 'mobilize_options' );

    add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
}

function mobilize_options() {
    global $wpdb;
    ?>
    <div class="wrap">
        <h2>Mobilize</h2>

        <div class="gb-ad">
            <h3><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 68 68"><defs/><rect width="100%" height="100%" fill="none"/><g class="currentLayer"><path fill="#313457" d="M34.76 33C22.85 21.1 20.1 13.33 28.23 5.2 36.37-2.95 46.74.01 50.53 3.8c3.8 3.8 5.14 17.94-5.04 28.12-2.95 2.95-5.97 5.84-5.97 5.84L34.76 33"/><path fill="#313457" d="M43.98 42.21c5.54 5.55 14.59 11.06 20.35 5.3 5.76-5.77 3.67-13.1.98-15.79-2.68-2.68-10.87-5.25-18.07 1.96-2.95 2.95-5.96 5.84-5.96 5.84l2.7 2.7m-1.76 1.75c5.55 5.54 11.06 14.59 5.3 20.35-5.77 5.76-13.1 3.67-15.79.98-2.69-2.68-5.25-10.87 1.95-18.07 2.85-2.84 5.84-5.96 5.84-5.96l2.7 2.7"/><path fill="#313457" d="M33 34.75c-11.9-11.9-19.67-14.67-27.8-6.52-8.15 8.14-5.2 18.5-1.4 22.3 3.8 3.79 17.95 5.13 28.13-5.05 3.1-3.11 5.84-5.97 5.84-5.97L33 34.75"/></g></svg> Thank you for using Mobilize!</h3>
            <p>If you enjoy this plugin, do not forget to <a href="https://wordpress.org/support/plugin/mobilize/reviews/?filter=5" rel="external">rate it</a>! We work hard to update it, fix bugs, add new features and make it compatible with the latest web technologies.</p>
            <p></p>
            <p style="font-size:14px">
                <b>Featured plugins:</b>&#32;
                🔥 <a href="https://wordpress.org/plugins/footnotes-made-easy/" target="_blank" rel="external noopener">Footnotes Made Easy</a> and&#32;
                🚀 <a href="https://wordpress.org/plugins/search-engines-blocked-in-header/" target="_blank" rel="external noopener">Search Engines Blocked in Header</a>.&#32;
                For WordPress related content, check out <a href="https://wpcorner.co/">WP Corner blog</a>.
            </p>
        </div>

        <form method="post">
            <?php
            if ( isset( $_POST['mmsubmit'] ) ) {
                update_option( 'mobilize_flavour', sanitize_text_field( $_POST['mobilize_flavour'] ) );
                update_option( 'mobilize_text_flavour', sanitize_text_field( $_POST['mobilize_text_flavour'] ) );
                update_option( 'mobilize_link_flavour', sanitize_text_field( $_POST['mobilize_link_flavour'] ) );
                update_option( 'mobilize_accent_flavour', sanitize_text_field( $_POST['mobilize_accent_flavour'] ) );

                update_option( 'mobilize_theme', sanitize_text_field( $_POST['mobilize_theme'] ) );
                update_option( 'mobilize_slide_direction', sanitize_text_field( $_POST['mobilize_slide_direction'] ) );

                update_option( 'mobilize_menu_toggle', sanitize_text_field( $_POST['mobilize_menu_toggle'] ) );
                update_option( 'mobilize_menu_close', sanitize_text_field( $_POST['mobilize_menu_close'] ) );
                update_option( 'mobilize_menubar_maxwidth', (int) $_POST['mobilize_menubar_maxwidth'] );

                update_option( 'mobilize_block_id', (int) $_POST['mobilize_block_id'] );

                echo '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>' . __( 'Settings saved.', 'mobilize' ) . '</strong></p></div>';
            }
            ?>

            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><h2><?php _e( 'Usage and Requirements', 'mobilize' ); ?></h2></th>
                        <td>
                            <p>Add the <code>.mobilize-toggle</code> class to any item to trigger the <b>Mobilize</b> menu.</p>
                            <hr>
                            <p><small>Your theme needs to have the <code>wp_footer()</code> function in your <code>footer.php</code> template.</small></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="2"><h2><?php _e( 'Content Settings', 'mobilize' ); ?></h2></th>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mobilize_menu_toggle"><?php _e( 'Mobilize Menu Toggle Text', 'mobilize' ); ?></label></th>
                        <td>
                            <p>
                                <input type="text" name="mobilize_menu_toggle" value="<?php echo get_option( 'mobilize_menu_toggle' ); ?>">
                            </p>
                            <p>
                                This is the top bar menu toggle text (e.g. "&vellip; Quick Menu" or "Menu" or "&#9776;" or "&equiv;")
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mobilize_menu_close"><?php _e( 'Mobilize Menu Close Text', 'mobilize' ); ?></label></th>
                        <td>
                            <p>
                                <input type="text" name="mobilize_menu_close" value="<?php echo get_option( 'mobilize_menu_close' ); ?>">
                            </p>
                            <p>
                                This is the menu close toggle text (e.g. "Close" or "Exit")
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mobilize_block_id"><?php _e( 'Mobilize Menu', 'mobilize' ); ?></label></th>
                        <td>
                            <p>
                                Create a <a href="<?php echo admin_url( 'nav-menus.php' ); ?>">new menu</a> and assign it to the "Mobilize" location.<br>
                                If you want to duplicate an existing menu, just assign it to the "Mobilize" location.<br>
                                If you don't want a menu, just create an empty menu and assign it to the "Mobilize" location.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mobilize_block_id"><?php _e( 'Mobilize Reusable Block', 'mobilize' ); ?></label></th>
                        <td>
                            <?php
                            $mobilize_block_id = get_option( 'mobilize_block_id' );

                            $args = [
                                'post_type'      => 'wp_block',
                                'posts_per_page' => -1,
                                'order'          => 'ASC',
                                'orderby'        => 'title',
                            ];

                            $wp_block_query = new WP_Query( $args );
                            ?>

                            <select name="mobilize_block_id" id="mobilize_block_id">
                                <option value="">Select a reusable block...</option>

                                <?php
                                if ( $wp_block_query->have_posts() ) {
                                    while ( $wp_block_query->have_posts() ) {
                                        $wp_block_query->the_post();

                                        $selected = ( (int) $mobilize_block_id === (int) get_the_ID() ) ? 'selected' : '';

                                        echo '<option value="' . get_the_ID() . '" ' . $selected . '>' . get_the_title() . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <br><small>Select your mobilize reusable block or <a href="<?php echo admin_url( 'edit.php?post_type=wp_block' ); ?>">create one now</a>.</small>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mobilize_block_id"><?php _e( 'Colour Settings', 'mobilize' ); ?></label></th>
                        <td>
                            <p>
                                <label for="mobilize_flavour"><b>Mobilize</b> background colour</label>
                                <br><input type="text" name="mobilize_flavour" class="color-well" data-default-color="#001c40" value="<?php echo get_option( 'mobilize_flavour' ); ?>">
                                <br><small>This is the colour of the menu container</small>
                            </p>
                            <p>
                                <label for="mobilize_text_flavour"><b>Mobilize</b> text colour</label>
                                <br><input type="text" name="mobilize_text_flavour" class="color-well" data-default-color="#ffffff" value="<?php echo get_option( 'mobilize_text_flavour' ); ?>">
                                <br><small>This is the colour of the menu text</small>
                            </p>
                            <p>
                                <label for="mobilize_link_flavour"><b>Mobilize</b> link colour</label>
                                <br><input type="text" name="mobilize_link_flavour" class="color-well" data-default-color="#ffffff" value="<?php echo get_option( 'mobilize_link_flavour' ); ?>">
                                <br><small>This is the colour of the menu links</small>
                            </p>
                            <p>
                                <label for="mobilize_accent_flavour"><b>Mobilize</b> accent colour</label>
                                <br><input type="text" name="mobilize_accent_flavour" class="color-well" data-default-color="#f1be46" value="<?php echo get_option( 'mobilize_accent_flavour' ); ?>">
                                <br><small>This is the colour of the various menu design elements</small>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mobilize_block_id"><?php _e( 'Mobile Device Settings', 'mobilize' ); ?></label></th>
                        <td>
                            <p>
                                <input type="number" name="mobilize_menubar_maxwidth" id="mobilize_menubar_maxwidth" min="0" max="9999" value="<?php echo get_option( 'mobilize_menubar_maxwidth' ); ?>"> <label for="mobilize_menubar_maxwidth">Maximum width for menu button (px) (default is <code>768</code>)</label>
                            </p>
                            <p>Use <code>0</code> to hide the top bar completely and assign an element to trigger the menu.</p>
                            <p>This option acts as a media query - <code>@media screen and (max-width: 768px) {}</code></p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="2"><h2><?php _e( 'Design Settings', 'mobilize' ); ?></h2></th>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mobilize_slide_direction"><?php _e( 'Slide Direction', 'mobilize' ); ?></label></th>
                        <td>
                            <p>
                                <select name="mobilize_slide_direction" id="mobilize_slide_direction">
                                    <option value="left" <?php echo ( get_option( 'mobilize_slide_direction' ) ) === 'left' ? 'selected' : ''; ?>>Left</option>
                                    <option value="right" <?php echo ( get_option( 'mobilize_slide_direction' ) ) === 'right' ? 'selected' : ''; ?>>Right (default)</option>
                                </select>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="mobilize_theme"><?php _e( 'Mobile Theme', 'mobilize' ); ?></label></th>
                        <td>
                            <p>
                                <select name="mobilize_theme" id="mobilize_theme">
                                    <option value="default" <?php echo ( get_option( 'mobilize_theme' ) ) === 'default' ? 'selected' : ''; ?>>Default</option>
                                    <option value="modern" <?php echo ( get_option( 'mobilize_theme' ) ) === 'modern' ? 'selected' : ''; ?>>Modern</option>
                                </select>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <hr>
            <p>
                <input name="mmsubmit" type="submit" class="button-primary" value="Save Changes">
            </p>
        </form>

        <div class="postbox">
            <div class="inside">
                <p>For support, feature requests and bug reporting, please open an issue on <a href="https://github.com/wpcorner/mobilize/" rel="external">GitHub</a>.</p>
                <p>&copy;<?php echo gmdate( 'Y' ); ?> <a href="https://wpcorner.co/" rel="external"><strong>WP Corner</strong>.co</a> &middot; <small>Code wrangling since 2005</small></p>
            </div>
        </div>
    </div>
    <?php
}

function mobilize_enqueue_color_picker() {
    wp_enqueue_style( 'gbad', plugins_url( 'css/gbad.css', __FILE__ ) );

    wp_enqueue_script( 'mobilize', plugins_url( 'js/mobilize-functions.js', __FILE__ ), [], '3.0.5', true );
}

// Frontend actions and filters
add_action( 'wp_enqueue_scripts', 'mobilize_custom_css' );
add_action( 'wp_footer', 'mobilize' );
add_filter(
    'body_class',
    function ( $classes ) {
        return array_merge( $classes, [ 'mobilize' ] );
    }
);
//

add_action( 'admin_enqueue_scripts', 'mobilize_enqueue_color_picker' );

function mobilize_custom_css() {
    wp_enqueue_script( 'mobilize', plugins_url( 'js/mobilize.js', __FILE__ ), [], '3.0.5', true );
    wp_enqueue_style( 'mobilize', plugins_url( 'css/mobilize.min.css', __FILE__ ), [], '3.0.5' );

    $mobilize_flavour        = get_option( 'mobilize_flavour' );
    $mobilize_text_flavour   = get_option( 'mobilize_text_flavour' );
    $mobilize_link_flavour   = get_option( 'mobilize_link_flavour' );
    $mobilize_accent_flavour = get_option( 'mobilize_accent_flavour' );

    $mobilize_menubar_maxwidth = get_option( 'mobilize_menubar_maxwidth' );
    $mobilize_slide_direction  = ( (string) get_option( 'mobilize_slide_direction' ) === 'left' ) ? '-100%' : '100%';

    $css = ':root {
        --mobilize-nav: ' . $mobilize_flavour . ';
        --mobilize-text: ' . $mobilize_text_flavour . ';
        --mobilize-link: ' . $mobilize_link_flavour . ';
        --mobilize-accent: ' . $mobilize_accent_flavour . ';
        --mobilize-direction: ' . $mobilize_slide_direction . ';
    }

    @media screen and (max-width: ' . $mobilize_menubar_maxwidth . 'px) {
        body.mobilize { padding-top: 48px; }
        .mobilize-nav { display: block; }
    }';

    if ( $mobilize_slide_direction === 'left' ) {
        $css .= '#mobilize-menu { left: 0; right: auto; }';
    }

    wp_add_inline_style( 'mobilize', $css );
}

function mobilize() {
    $mobilize_theme       = ( get_option( 'mobilize_theme' ) !== '' ) ? get_option( 'mobilize_theme' ) : 'default';
    $mobilize_menu_toggle = ( get_option( 'mobilize_menu_toggle' ) !== '' ) ? get_option( 'mobilize_menu_toggle' ) : '&equiv;';
    $mobilize_menu_close  = ( get_option( 'mobilize_menu_close' ) !== '' ) ? get_option( 'mobilize_menu_close' ) : '&times; Close';

    $display = '<div class="mobilize-nav">
        <a href="#" class="mobilize-toggle nav-icon" aria-label="' . $mobilize_menu_toggle . '">' . $mobilize_menu_toggle . '</a>
    </div>

    <section id="mobilize-menu" class="mobilize-theme-' . $mobilize_theme . '">
        <section class="mobilize-menu-content">
            <a href="#" class="mobilize-toggle">' . $mobilize_menu_close . '</a>';

            $display .= wp_nav_menu(
                [
                    'theme_location' => 'mobilize',
                    'menu_class'     => '',
                    'container'      => false,
                    'echo'           => false,
                ]
            );

            // Get Mobilize reusable block
            if ( (int) get_option( 'mobilize_block_id' ) > 0 ) {
                $reusable_block = get_post( (int) get_option( 'mobilize_block_id' ) );

                $display .= apply_filters( 'the_content', $reusable_block->post_content );
            }

        $display .= '</section>
    </section>';

    echo $display;
}
