<?php
session_start();
session_destroy();
require_once 'template/functions.php';
header_safe('regform.php');
?>