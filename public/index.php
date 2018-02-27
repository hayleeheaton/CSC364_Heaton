<?php
require ($_SERVER[ 'DOCUMENT_ROOT'] . "/../includes/application_includes.php");
require_once (FS_TEMPLATES . 'layout.php');

// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Get the stories for column 1 from the database
$sql = 'select * from posts';
$posts = $db->query($sql);
// Run a simple query that will be rendered in column 2 below
$sql = 'select id, name, description from pages';
$res = $db->query($sql);
// Generate the HTML for the top of the page
Layout::pageTop('CSC364 Project');
// include(FS_TEMPLATES . 'pageTop.php')
/**
 *
 * This implementation mixes html and php code to enter data
 * It's a simple implementation but it works
 *
 */
?>

    <div class="container top25">
        <div class="w3-twothird">
            <section class="content">
                <?php
                // Loop through the posts and display them
                while ($post = $posts->fetch()) {
                    // Call the method to create the layout for a post
                    News::story($post);
                }
                ?>
            </section>
        </div>
        <div class = "w3-twothird w3-right">
             <section class="SideBar">
                <?php
                layout::SideBar();
                ?>
             </section>
        </div>
    </div>

<div class="w3-twothird">
    <section class="content">
    </section>
</div>


<div class = "w3-col w3 w3-border-dark-gray w3-padding-32 w3-padding-xlarge">
        <?php
        // Generate the page footer
        layout::pageBottom();
        ?>
</div>


