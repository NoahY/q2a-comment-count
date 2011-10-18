<?php
        
/*              
        Plugin Name: Comment Count
        Plugin URI: https://github.com/NoahY/q2a-comment-count
        Plugin Description: Comment count in q-lists
        Plugin Version: 1.0b
        Plugin Date: 2011-10-18
        Plugin Author: NoahY
        Plugin Author URI:                              
        Plugin License: GPLv2                           
        Plugin Minimum Question2Answer Version: 1.4
*/                      
                        
                        
        if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
                        header('Location: ../../');
                        exit;   
        }               

        qa_register_plugin_module('module', 'qa-ccount-admin.php', 'qa_ccount_admin', 'Comment Count Admin');
                
        qa_register_plugin_layer('qa-ccount-layer.php', 'Comment Count Layer');
                        
                        
/*                              
        Omit PHP closing tag to help avoid accidental output
*/                              
                          

