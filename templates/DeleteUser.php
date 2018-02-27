<?php
/**
 * Created by PhpStorm.
 * User: hayle
 * Date: 4/2/2017
 * Time: 9:31 PM
 */
// Load all application files and configurations
require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
// Include the HTML layout class
include('../Templates/layout.php');
include('../Templates/News.php');
// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Initialize variables
$requestType = $_SERVER['REQUEST_METHOD'];
$email = $_GET['email'];
$sql = "delete from users where email=" . $_GET['email'];
$result = $db->query($sql);
// Generate the page footer
header('Location: index.php');