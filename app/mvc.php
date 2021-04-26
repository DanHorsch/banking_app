<?php
// This will require all of the files
// that we'll be using

// Notes
// Any of the classes should have a capital
// filename first letter
// functions inside a class should be alphabetical
//

// Load config
require_once 'config/config.php';

// load helper functions - these are just php functions
// and not classes
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';
require_once 'helpers/icon_helper.php';

// Load Libraries
require_once 'libraries/core.php';
require_once 'libraries/controller.php';
require_once 'libraries/database.php';

spl_autoload_register(function($className) {
  require_once 'models/' . $className . '.php';
});
