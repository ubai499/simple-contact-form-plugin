<?php
/*
Plugin Name: Simple Contact Form
Description: Simple Contact Form Plugin 
Version: 1.0
Author: Bait ur Rehman
*/

if(!defined('ABSPATH'))
{
    echo "what you are trying to do?";
    exit();
}


class SimpleContactForm {

    public function __construct()
    {
        // creating a custom post type
        add_action('init', array($this,'create_custom_post_type'));

        // action for loading assest 
        add_action('wp_enqueue_scripts', array($this,'load_assests'));

    }

    public function create_custom_post_type()
    {
        // echo "<script> alert('hello'); </script>";
        $args = array(
            'public' => true,
            'has_archive' => true,
            'support' => array('title'),
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'capability' => 'manage_options',
            'labels' => array(
                'name' => 'Contact Form',
                'singular_name' => 'Contact Form Entry',
            ),
            'menu_icon' => 'dashicons-media-text',
        );
        register_post_type('simple_contact_form',$args);
    }
    
    public function load_assests()
    {
        wp_enqueue_style( 
        'simple-contact-form',
         plugin_dir_url( __FILE__ ).'css/simple-contact-form.css',
         array(),
         1, 
        'all'
        );

        wp_enqueue_script( 
        'simple-contact-form',
        plugin_dir_url( __FILE__ ).'js/simple-contact-form.js',
        array('jquery'),
        1,
        true 
        );
    
    }
}



$SimpleContactForm = new SimpleContactForm();

?>