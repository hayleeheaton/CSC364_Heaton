<?php
// Include the basic configuration elements
require_once($_SERVER['DOCUMENT_ROOT'].'/../includes/application_includes.php');
// Generate the HTML for the top of the page
    Layout::pageTop('Create User');
    ?>
    <div class="container top25">
    <div class="col-md-8">
        <section class="content">

            <?php
            if ($requestType == 'GET') {
                // Display the form
                showForm();
            } elseif ($requestType == 'POST') {
                if (validateInput($_POST)) {
                    echo '<h1>The data here was inputted</h1>';
                    $email = $_POST['email'];
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $sql = "insert into users (firstName, lastName, email, password)  values ('" . $firstName . "', '" . $lastName . "', '" . $email . "', '" . $password . "')";
                    $db->query($sql);
                    echo '<h1>you are signed in</h1>';
                } else {
                    // This is an error so show the form again
                    echo '<h1>it did not work</h1>';
                    showForm($_POST);
                }
                header('Location: index.php');
            }
            ?>


        </section>
    </div>
    <?php

/**
 * Functions that support the createPost page
 */
$fields = [
    'password'   => ['required', 'password'],
    'firstName' => ['required', 'firstName'],
    'lastName' => ['required', 'lastName'],
    'email' => ['required', 'email']
];
function validateInput($formData)
{
    // use the global $fields list
    global $fields;
    $message = '';
    // Assume everything will be valid
    $validData = true;
    // Loop through the whitelist to ensure required data is provided and the data
    // is of the correct type
//    foreach ($fields as $name => $field){
//        $isRequired = ($field[0] == 'required') ? true : false;
//
//        $inArray = array_key_exists($name, $formData);
//
//
//
//        // Check for proper type of data
//        // if ()
//
//
//    }
    return true;
}
/**
 * Show the form
 */
     function showForm($data = null)
     {
         $firstName = $data['firstName'];
         $lastName = $data['lastName'];
         $password = $data['password1'];
         $email = $data['email'];

     }
{
    echo <<<postform
<form id="CreatePostForm" action='CreateUser.php' method="POST" class="form-horizontal">
<fieldset>
<!-- Form Name -->
<legend>Sign Up Form</legend>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="firstName">First Name</label>  
  <div class="col-md-4">
  <input id="firstName" name="firstName" type="text" placeholder="First" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lastName">Last Name</label>  
  <div class="col-md-4">
  <input id="lastName" name="lastName" type="text" placeholder="Last" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="Username" type="text" placeholder="Email" class="form-control input-md" required=""> 
  </div>
</div>
<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="signUpButton"></label>
  <div class="col-md-4">
    <button id="signUpButton" name="signUpButton" class="btn btn-info">Create</button>
  </div>
</div>
</fieldset>
</form>
postform;
}
// Generate the page footer
Layout::pageBottom();
