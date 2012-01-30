<?php
/*
Plugin Name: BuddyPress Sitewide Notice Widget
Description: Wrap the BuddyPress sitewide notice in a widget. 
Version: 0.1
Author: Jennifer M. Dodd
Author URI: http://uncommoncontent.com/
Text Domain: buddypress-sitewide-notice-widget 
Domain Path: /lang
*/ 

/*
	Copyright 2012 Jennifer M. Dodd (email: jmdodd@gmail.com)

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/


if ( ! defined( 'ABSPATH' ) ) exit;


if ( ! class_exists( 'UCC_BP_Sitewide_Notice_Widget' ) ) {
class UCC_BP_Sitewide_Notice_Widget extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_ucc_bp_sitewide_notice',
			'description' => __( 'Display the BuddyPress sitewide notice', 'buddypress-sitewide-notice-widget' ) 
		);
		parent::__construct( 'ucc-bp-sitewide-notice', __( 'BuddyPress Sitewide Notice', 'buddypress-sitewide-notice-widget' ), $widget_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		if ( function_exists( 'bp_is_active' ) && function_exists( 'bp_message_get_notices' ) ) {
			if ( is_user_logged_in() && bp_is_active( 'messages' ) ) { 
				echo $before_widget;
				bp_message_get_notices();
				echo $after_widget;
			}
		}
	}

	function update( $new_instance, $old_instance ) {
	}

	function form( $instance ) {
	}
} }


if ( ! function_exists( 'ucc_bsnw_init' ) ) {
function ucc_bsnw_init() { 
	register_widget( 'UCC_BP_Sitewide_Notice_Widget' );
} }
add_action( 'widgets_init', 'ucc_bsnw_init' ); 

