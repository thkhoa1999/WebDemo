<?php
require('config.php');

unset($_SESSION['login']);
unset($_SESSION['login-id']);
unset($_SESSION['login-name']);
header('location: login.php');