<?php
// Include the basic configuration elements
require_once($_SERVER['DOCUMENT_ROOT'].'/../includes/application_includes.php');
// Generate the HTML for the top of the page
Layout::pageTop('Edit Profile');
// Page content goes here
?>
    <div class="container top25">
        <div class="col-md-8">
            <section class="content">

                <?php
                if ($requestType == 'GET') {

                    $sql = "select * from users where email = '" . $_GET['email'] . "'";
                    $result = $db->query($sql);
                    $row = $result->fetch();
                    //News::story($row);
                    //showUpdateForm($row);
                    $email = $row['email'];
                    $password = $row['password'];
                    $firstName = $row['firstName'];
                    $lastName = $row['lastName'];
                    echo <<<postform
    <form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Update Profile</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="username" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">First Name</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="First Name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Last Name</label>  
  <div class="col-md-4">
  <input id="textinput" name="textinput" type="text" placeholder="Last Name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Update Profile</button>
  </div>
</div>

</fieldset>
</form>
postform;
                } elseif ($requestType == 'POST') {
                    //Validate data
                    // Save data
                    $firstName = htmlspecialchars($_POST['firstName'], ENT_QUOTES);
                    $lastName = htmlspecialchars($_POST['lastName'], ENT_QUOTES);
                    //add in startdate and enddate
                    //echo '<pre>' . print_r($_POST) . '</pre>';
                    $sql = "update users set firstName = '$firstName', lastName = '$lastName'";
                    $result = $db->query($sql);
                    header('Location: logoff.php');
                }
                ?>
            </section>
        </div>

    </div>


<?php
// Generate the page footer
Layout::pageBottom();

