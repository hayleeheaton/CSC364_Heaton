<?php
// Include the basic configuration elements
require_once($_SERVER['DOCUMENT_ROOT'].'/../includes/application_includes.php');
require_once (FS_TEMPLATES . 'layout.php');
// Generate the HTML for the top of the page
Layout::pageTop('Delete Product');
if ( $requestType == 'GET' ) {
    // use sql to get the post with id = 39
    $sql = 'delete FROM products WHERE id = ' . $_GET['$id'];//delete
    $result = $db->query($sql);
}
header('Location:index.php');


