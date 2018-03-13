<?php

/**
 * PHP Class example. Seeks to show users how to add tabs and tab content to the lead profile.
 */

if (!class_exists('Lead_Profile_Custom_Tabs')) {

    class Lead_Profile_Custom_Tabs {

        static $tab_id; /* static class variable */

        /**
         *  Initialize class
         */
        public function __construct() {
            self::$tab_id = 'wpleads_new_tab';
            self::load_hooks();
        }

        /**
         *  Loads hooks and filters
         */
        private function load_hooks() {

            /* add nav tabs */
            add_filter('wpl_lead_tabs', array( __CLASS__ , 'create_nav_tabs' ) , 10, 1);

            /* add nav tab content */
            add_action( 'wpl_print_lead_tab_sections' , array( __CLASS__ , 'add_content_container' ) );


        }


        /**
         * Create New Nav Tabs in WordPress Leads - Lead UI
         */
        public static function create_nav_tabs( $nav_items ) {
            global $post;


            /* Add attachments tab */
            $nav_items[] = array(
                'id'=> self::$tab_id,
                'label'=> __( 'New Tab' , 'inbound-pro' )
            );


            return $nav_items;
        }

        /**
         *  Prints container content
         */
        public static function add_content_container() {

            global $post;

            ?>
           <div class="lead-profile-section" id="<? echo self::$tab_id; ?>" >
               <!--tab contents here-->
            </div>
            <?php


        }


    }


    new Lead_Profile_Custom_Tabs;


}
