<?php
// Include the basic configuration elements
require_once($_SERVER['DOCUMENT_ROOT'].'/../includes/application_includes.php');
// Generate the HTML for the top of the page
Layout::pageTop('View Post');
// use sql to get the post with id = 39
$sql = 'select * from posts where id = ' . $_GET['id'];//delete
$result = $db->query($sql);
$row = $result->fetch();
$id = $row['id'];
$title = $row['title'];
$content = $row['content'];
$startDate = $row ['startDate'];
$endDate = $row ['endDate'];
echo <<<viewform
<form id="createPostForm" action='updatePosts.php' method="POST" class="form-horizontal">
    <fieldset>
        <input type="hidden" name="id" value=$id">
        <input type="hidden" name="title" value=$title">
        <input type="hidden" name="content" value=$content">
        <input type="hidden" name="startDate" value=$startDate">
        <input type="hidden" name="endDate" value=$endDate">


        <form id="createPostForm" action='updatePosts.php' method="POST" class="form-horizontal">
            <fieldset>
                <input type="hidden" name="id" value=$id">
                <input type="hidden" name="title" value=$title">
                <input type="hidden" name="content" value=$content">
                <input type="hidden" name="startDate" value=$startDate">
                <input type="hidden" name="endDate" value=$endDate">

                <!-- Form Name -->
                <legend>View your post below!</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="title">Title</label>
                    <div class="col-md-8">
                        <input id="title" name="title" type="text" placeholder="post title" value="$title" class="form-control input-md" readonly required="">
                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="content">Content</label>
                    <div class="col-md-8">
                        <textarea class="form-control" id="content" name="content" readonly>$content</textarea>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="startDate">Effective Date</label>
                    <div class="col-md-8">
                        <input id="startDate" name="startDate" type="text" placeholder="effective date" value="$startDate" class="form-control input-md" readonly required="">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-3 control-label" for="endDate">End Date</label>
                    <div class="col-md-8">
                        <input id="endDate" name="endDate" type="text" placeholder="end date" value="$endDate" class="form-control input-md" readonly>
                    </div>
                </div>

            </fieldset>
        </form>
viewform;

layout::pageBottom();