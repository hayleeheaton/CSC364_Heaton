<?php
// Include the basic configuration elements
require_once($_SERVER['DOCUMENT_ROOT'].'/../includes/application_includes.php');

// Page content goes here
    ?>

    <div class="container top25">
        <div class="col-md-8">
            <section class="content">

                <?php
                if ($requestType == 'GET') {
                    // Display the form
                    showForm();
                } elseif ($requestType == 'POST') {
                    // Process data that was submitted
                    echo '<h2>This is the data that was entered</h2>';
                    echo '<pre>';
                    print_r($_POST);
                    echo '</pre>';
                    // pull the fields from the POST array.
                    $name = $_POST['name'];
                    $input = $_POST;

                    $file = $_FILES[ 'picture' ][ 'tmp_name' ];
                    $fileName = $_FILES[ 'picture' ][ 'name' ];

                    if (!$_FILES[ 'picture' ][ 'tmp_name' ] == 0){
                        if ( !is_uploaded_file($file) ) {
                            echo '<h3>Error</h3><p>File was not uploaded via POST form.</p>';
                            exit;
                        }

                        if ( file_exists($file) ) {
                            $imagesizedata = getimagesize($file);
                            if ( $imagesizedata === false ) {
                                //not image
                                echo '<h3>Error</h3><p>Uploaded file is not an image.</p>';
                                exit;
                            } else {
                                //image information
                                echo '<h3>Success</h3><p>The image was uploaded</p>';
                                //echo '<pre>' . print_r($imagesizedata) . '</pre>';
                                // Copy image to permanent location
                                $uploaded_file = $_SERVER[ 'DOCUMENT_ROOT' ] . '/images/' . $_FILES[ 'picture' ][ 'name' ];
                                // Move file to permanent location
                                move_uploaded_file($file, $uploaded_file);
                                // Display the image
                                //showImage($input, $_FILES[ 'image' ]);
                                echo '<pre>';
                                print_r($input);
                                echo '</pre><br>';
                                echo '<pre>';
                                print_r($_FILES);
                                echo '</pre><br>';
                            }
                        }
                    }//else{$fileName = "logo.bmp";}
                    //not file

                    //echo '<h3>Error</h3><p>There was an error uploading the file</p>';


                    $picture = $fileName;
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $sku = $_POST['sku'];
                    $qty_available = $_POST['qty_available'];
                    // This SQL uses double quotes for the query string.  If a field is not a number (it's a string or a date) it needs
                    // to be enclosed in single quotes.  Note that right after values is a ( and a single quote.  Taht single quote comes right
                    // before the value of $title.  Note also that at the end of $title is a ', ' inside of double quotes.  What this will all render
                    // That will generate this piece of SQL:   values ('title text here', 'content text here', '2017-02-01 00:00:00'  and so
                    // on until the end of the sql command.
                    $sql = "insert into products (name, description, price, picture, sku, qty_available) values ('" . $name . "', '" . $description . "', " . $price . ", '" . $picture . "', '" . $sku . "'," . $qty_available . ");";
                    $db->query($sql);
                    header('Location: index.php');
                }
                
                    exit;
                    

                ?>


            </section>
        </div>
    </div>

    <?php
/**
 * Functions that support the createPost page
 */
$fields = [
    'id'     => ['required', 'string'],
    'name'   => ['required', 'string'],
    'description' => ['required', 'date'],
    'price'   => ['required', 'date'],
    'picture'   => ['required', 'date'],
    'sku'   => ['required', 'date'],
    'qty_available'   => ['required', 'date'],
    //'image'     => ['string']
];
/**
 * Show the form
 */
function showForm($data = null)
{
    $id = $data['id'];
    $name = $data['name'];
    $description = $data['desription'];
    $price = $data['price'];
    $picture = $data['picture'];
    $sku = $data['sku'];
    $qty_available = $data['qty_available'];
    echo <<<postform

<form class="form-horizontal" action="CreatePost.php" method="POST" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend>Create New Product</legend>

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
}
