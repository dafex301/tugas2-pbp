<?php
require_once 'init.php';

// Unset the answer session
unset($_SESSION['answers']);
// Redirect to home
header("Location: index.php");
