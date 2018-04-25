<?php
/* 	Start-up activities prior to loading the page content.  This will make a connection
 *	to the database and start a session.
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');

?>

  <div style="padding-top: 48px;">
  <fieldset>
  <!-- Button (Double) -->
  <div align="center">
  <form>
  <div class="form-group" method="POST">
    <label class="col-md-4 control-label" for="button1id"></label>
    <div class="col-md-8">
      <a href="index.php" class="btn btn-dark" role="button">Home</a>
    </div>
  </div>
  </div>
</div>
  </fieldset>
  </form>


  <?php
  // If our cart exists within SESSION
  if(array_key_exists('cart',$_SESSION))
  {
    // Make $cart hold _SESSION cart
    $cart = $_SESSION['cart'];
  }
  // Add our specific item to cart
  $item = $_POST;
  // Variable we will use to determine if the item exists in cart already
  $exists = 0;
  // Cycle through the products in our cart
  foreach($cart as $key => $value)
  {
      // If the value id we are sending equals an item id already in the Cart
      // Increment the qty_selected and change our exists value to 1
      // then break out of the foreach loop to prevent accidental repeats
      if($value['id'] == $id['id'])
      {
        $cart[$key][qty_selected]++;
        $exists = 1;
        break;
      }
  }
  // If the item does not exist, add the new item to cart
  if(!$exists)
  {
    $cart[]=$item;
  }
  // Saves session cart to cart
  $_SESSION['cart'] = $cart;
  // Output the contents of the cart
  echo '<pre>'; print_r($_SESSION['cart']); echo '</pre>';
 
 ?>