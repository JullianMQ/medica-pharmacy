<?php
include_once('../includes/config.inc.php');
include_once('../includes/dbh.inc.php');

session_unset();
session_destroy();

header("Location: ../admin/admin_login.php");