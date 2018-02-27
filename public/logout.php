<?php
require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
unset($_SESSION['user']);
header('location: index.php');