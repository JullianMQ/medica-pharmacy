<?php

// prevent session fixation
ini_set('session.use_only_cookies', 1);
// To make website only use session id that was created by the server
ini_set('session.use_strict_mode', 1);

// make cookie not run for too long, cookie gets destroyed after a while
// cookie gets destroyed after 1 day
// need to login again after that
// ! This is for safety reasons
session_set_cookie_params([
    'lifetime' => 86400,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);

session_start();

// if (!isset($_SESSION['last_regeneration'])) {
//     session_regenerate_id(true);
//     $_SESSION['last_regeneration'] = time();
// } else {
    
//     // regenerate ID every day
//     // 60 = seconds, 1440 = minutes = 1 day
//     $interval = 60 * 1440;
    
//     if (time() - $_SESSION['last_regeneration'] >= $interval) {
//         session_regenerate_id(true);   
//         $_SESSION['last_regeneration'] = time();
//     }
// }
