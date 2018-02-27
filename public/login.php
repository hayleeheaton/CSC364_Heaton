<?php
// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');
require_once(FS_TEMPLATES . 'News.php');
require_once(FS_TEMPLATES . 'Layout.php');
// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Generate the HTML for the top of the page
layout::pageTop('Login');
// Get the posts for this page from the database
$sql = 'select * from posts';
$result = $db->query($sql);
$posts = $result->fetchAll();



function showLoginForm()
{

    echo <<<loginform

<form class="form-horizontal" method="post" action="login.php">
<fieldset>

<!-- Form Name -->
<legend>Login</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Username</label>  
  <div class="col-md-4">
  <input id="username" name="email" type="text" placeholder="Username" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Password">Password</label>
  <div class="col-md-4">
    <input id="Password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Login</button>
  </div>
</div>

</fieldset>
</form>

loginform;
}
?>

<?php
if ( $requestType == 'GET') {
//Display the form
    showLoginForm();
}
if ( $requestType == 'POST') {

    echo '<h1>Logging In...</h1>';
    $input = $_POST;

//Check to see if user exists
    $sql = "select * from users where email = '" . $input ['email'] . "'";
    $result = $db->query($sql);

    if (! $result->size() == 0) {
        $user = $result->fetch();
        if (password_verify($input['password'], $user['password'])) {
            $_SESSION['user'] = $user;
        //We have a user so let's compare passwords
            echo '<h1>Welcome Back!</h1>';
        } else {
            echo '<h1>Invalid password. Please try again or Sign Up</h1>';
        }
    }
}
//Generate the page footer
Layout::pageBottom('');

/**
 * Functions that support the createPost page
 */
$fields = [
    'email'     => ['required', 'string'],
    'password'   => ['required', 'string'],
];

function showForm($data = null)
{
    $mypassword = $data['password1'];
    $myemail = $data['email'];
    // layout::loginform();
}


?>
