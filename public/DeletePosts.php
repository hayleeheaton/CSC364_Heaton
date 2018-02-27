<?php
// Include the basic configuration elements
require_once($_SERVER['DOCUMENT_ROOT'].'/../includes/application_includes.php');
// Generate the HTML for the top of the page
Layout::pageTop('Delete Post');
if ( $requestType == 'GET' ) {
    // use sql to get the post with id = 39
    $sql = 'delete from posts where id = ' . $_GET['id'];//delete
    $result = $db->query($sql);
}
header('Location:index.php');


