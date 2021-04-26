<?php
  // Constants
  define("APPROOT", dirname(dirname(__FILE__)));
  define("SITENAME", "Sample Banking");
  define("APPVERSION", "1.0.0");
  date_default_timezone_set('America/Chicago');

  // Local
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  define("URLROOT", "http://localhost/sample_banking_app");
  define("DB_HOST", "Localhost");
  define("DB_NAME", "sample_banking");
  define("DB_USER", "root");
  define("DB_PASS", "");
