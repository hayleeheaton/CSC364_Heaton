<?php
// Include the basic configuration elements
require_once($_SERVER['DOCUMENT_ROOT'].'/../includes/application_includes.php');
require_once (FS_TEMPLATES . 'layout.php');
// Generate the HTML for the top of the page
Layout::pageTop('Update Posts');
// Page content goes here
?>
    <div class="container top25">
        <div class="col-md-8">
            <section class="content">

                <?php
                if ($requestType == 'GET') {

                    $sql = 'select * from products where id = ' . $_GET['id'];
                    $result = $db->query($sql);
                    $row = $result->fetch();
                    //News::story($row);
                    //showUpdateForm($row);
                    $id = $row['id'];
                    $name = $row['name'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $sku = $row['sku'];
                    $qty_available = $row['qty_available'];
                    $pic = $row['picture'];
                    echo <<<postform
                
                <form class="form-horizontal" action="CreatePost.php" action = 'UpdatePosts.php' method="POST" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Update Product</legend>

<!-- Name -->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Product Name</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Description</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="description">Description
</textarea>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="price">Price</label>  
  <div class="col-md-4">
  <input id="price" name="price" type="text" placeholder="$" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sku">SKU Number</label>  
  <div class="col-md-4">
  <input id="sku" name="sku" type="text" placeholder="#" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="qty_available">Quantity Available</label>  
  <div class="col-md-4">
  <input id="qty_available" name="qty_available" type="text" placeholder="#" class="form-control input-md">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="picture">Upload Picture</label>
  <div class="col-md-4">
    <input id="picture" name="picture" class="input-file" type="file">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit Product</button>
  </div>
</div>

</fieldset>
</form>
postform;
                } elseif ($requestType == 'POST') {
                    //Validate data
                    // Save data
                    $id = $_POST['id'];
                    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
                    $description = htmlspecialchars($_POST['description'], ENT_QUOTES);
                    $price = htmlspecialchars($_POST['price'], ENT_QUOTES);
                    $sku = htmlspecialchars($_POST['sku'], ENT_QUOTES);
                    $qty_available = htmlspecialchars($_POST['qty_available'], ENT_QUOTES);
                    $pic = htmlspecialchars($_POST['pic'], ENT_QUOTES);

                    //echo '<pre>' . print_r($_POST) . '</pre>';
                    $sql = "update posts set name = '$name', description = '$description', price = '$price', sku = '$sku', qty_available = '$qty_available', pic = '$pic' where id = $id;";
                    $result = $db->query($sql);
                    //header('Location: index.php');
                }
                ?>
            </section>
        </div>

    </div>


<?php
// Generate the page footer
Layout::pageBottom();