<?php
require_once('connect.php');

session_start();
if(!isset($_SESSION['login'])) {
    $_SESSION['login'] = false;
} else {
    
}