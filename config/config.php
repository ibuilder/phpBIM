<?php
// Configuration settings for the BIM Model Viewer application

// Database configuration
define('DB_URL', 'https://your-supabase-url.supabase.co');
define('DB_KEY', 'your-supabase-api-key');
define('DB_SCHEMA', 'public');

// Application settings
define('APP_NAME', 'BIM Model Viewer');
define('APP_VERSION', '1.0.0');
define('APP_ENV', 'production'); // Change to 'development' for local testing

// File upload settings
define('UPLOAD_DIR', __DIR__ . '/../public/uploads/');
define('MAX_FILE_SIZE', 10485760); // 10 MB

// Error reporting settings
if (APP_ENV === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
}

// Other configurations can be added as needed
?>