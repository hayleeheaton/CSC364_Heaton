<?php
// Include the basic configuration elements
require_once($_SERVER['DOCUMENT_ROOT'].'/../includes/application_includes.php');
if (! isset($_SESSION['user'])) {
    header('location: logIn.php');
}
else {
// Generate the HTML for the top of the page
    layout::pageTop('Get Posts');
// Get the posts for this page from the database
    $sql = 'select * from posts';
    $result = $db->query($sql);
    $posts = $result->fetchAll();
// Page content goes here
    ?>

    <div class="container top25">
        <div class="col-md-12">
            <section class="content">
                <?php
                // Create the table Header
                echo News::buildTableHeader($posts);
                // Fill data table
                foreach ($posts as $post) {
                    $post['content'] = substr($post['content'], 0, 35) . '...';
                    echo News::buildTableRow($post);
                }
                // Close the table
                echo News::closeTable();
                ?>
            </section>
        </div>
    </div>

    <?php

    Layout::pageBottom();
}