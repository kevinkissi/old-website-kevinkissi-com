<?php

    // Load the TGM init if it exists
    if ( file_exists( dirname( __FILE__ ) . '/tgm-init.php' ) ) {
        require_once dirname( __FILE__ ) . '/tgm-init.php';
    }

    // Load the embedded Redux Framework
    if ( file_exists( dirname( __FILE__ ).'/nice-framework/framework.php' ) ) {
        require_once dirname(__FILE__).'/nice-framework/framework.php';
    }

    // Load the theme/plugin options
    if ( file_exists( dirname( __FILE__ ) . '/options-init.php' ) ) {
        require_once dirname( __FILE__ ) . '/options-init.php';
    }

    // Load Redux extensions
    if ( file_exists( dirname( __FILE__ ) . '/nice-extensions/extensions-init.php' ) ) {
        require_once dirname( __FILE__ ) . '/nice-extensions/extensions-init.php';
    }

