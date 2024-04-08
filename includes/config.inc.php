<?php

// prevent session fixation
ini_set('session.use_only_cookies', 1);
// To make website only use session id that was created by the server
ini_set('session.use_strict_mode', 1);

// make cookie not run for too long, cookie gets destroyed after a while
session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

if (!isset($_SESSION['last_regeneration'])) {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
} else {
    
    // regenerate ID every 30 mins
    $interval = 60 * 30;
    
    if (time() - $_SESSION['last_regeneration'] >= $interval) {
        session_regenerate_id(true);   
        $_SESSION['last_regeneration'] = time();
    }
}
