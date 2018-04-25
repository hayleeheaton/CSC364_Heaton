<?php

class layout
{
    public static function LoggedIn()
     {
         $user = $_SESSION['user'];
         $x = '
         <div class="blog-masthead" >
         <div class="container" >
             <nav class="blog-nav" >
             <ul class="w3-ul">
                 <li align="left"><a href = "index.php">Home</a></li>
                 <li align= "left"><a href="/CreatePost.php">Create Post</a></li>
                 </ul>
             </nav >
         </div >
     </div >';
         return $x;
     }

    public static function LoggedOut()
     {
            $x = '
         <div class="blog-masthead" >
             <div class="container" >
             <div class="blog-nav" >
             <ul class="w3-ul">
                 <li align = "left" ><a href = "index.php" > Home</a></li>
                 <li align = "left" ><a href = "/CreatePost.php" > Create Product</a></li>
                 <li align = "left"><a href = "/Cart.php"> My Cart</a><li>
                 </ul>
             </nav >
             </div>      
          </div>';
            return $x;
     }
      /**		      /**
       * Creates the top part of the page.  This will usually be the HEAD area plus the nav bar and anything else that is		       * Creates the top part of the page.  This will usually be the HEAD area plus the nav bar and anything else that is
       * above the "content" of that page.		       * above the "content" of that page.
      @@ -9,11 +43,19 @@ class layout
       */
      public static function pageTop($title)
      {
          {
              if (isset($_SESSION['user'])) {
                  $menu = static::LoggedIn();
              } else {
                  $menu = static::LoggedOut();
              }
              // This builds the web path to the app.css file and is embedded in the header below		          // This builds the web path to the app.css file and is embedded in the header below
              echo <<<pagetop
    <!DOCTYPE html>
<html>
<head>


    <title>$title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
h1, h2, h3, h4, h5, h6 {
    font-family: "Oswald";
        }

        body {
    font-family: "Open Sans";
        }
    </style>
</head>


    <body class="w3-light-grey">

    <!-- Navigation bar with social media icons -->
    <ul class= "w3-bar w3-black w3-hide-small w3-ul">
        $menu
    </ul>
        
    <!-- w3-content defines a container for fixed size centered content,
    and is wrapped around the whole page content, except for the footer in this example -->
    <div class="w3-content" style="max-width:1600px">
    
        <!-- Header -->
        <header class="w3-container w3-center w3-padding-48 w3-white">
            <h1 class="w3-xxxlarge"><b>JEWELZ</b></h1>
            <h6>Trendy Fashion Statements by <span class="w3-tag">ACCESSORIZING</span></h6>
        </header>

        <!-- Image header -->
        <header class="w3-display-container w3-wide" id="home">
            <img class="background-image" src="/assets/images/Statement Jewelry.jpeg">
            <div class="w3-display-left w3-padding-xlarge">
                <h1 class="w3-text-white">rings, bracelets, necklaces</h1>
                <h1 class="w3-jumbo w3-text-black w3-hide-small"><b>JEWELZ</b></h1>
                <h6><button class="w3-btn w3-white w3-padding-large w3-large w3-opacity w3-hover-opacity-off" onclick="document.getElementById('subscribe').style.display='block'">SUBSCRIBE</button></h6>
            </div>
        </header>

pagetop;
          }
      }

    public static function SideBar()
    {
        echo <<<SideBar
  <!-- About/Information menu -->
                    <div class="w3-twothird w3-right">
                        <!-- About Card -->
                        <div class="w3-white w3-margin">
                            <img src="../assets/images/Nicholas Sparks Bio.jpg" alt="Biography" style="width:100%" class="w3-grayscale">
                            <div class="w3-container w3-black">
                                <h4>Nicholas</h4>
                                <p>Nicholas Sparks is one of the world’s most beloved storytellers. 
                                All of his books have been New York Times bestsellers, with over 
                                105 million copies sold worldwide, in more than 50 languages, 
                                including over 75 million copies in the United States alone.</p>
                            </div>
                        </div>
                        <hr>

                        <!-- Posts -->
                        <div class="w3-white w3-margin">
                            <div class="w3-container w3-padding w3-black">
                                <h4>Popular Books</h4>
                            </div>
                            <ul class="w3-ul w3-hoverable w3-white">
                                <li class="w3-padding-16">
                                    <img src="../assets/images/The Best of Me.jpeg" alt="TheBestofMe" class="w3-left w3-margin-right" style="width:50px">
                                    <span class="w3-large">The Best of Me</span>
                                    <br>
                                    <span>2014</span>
                                </li>
                                <li class="w3-padding-16">
                                    <img src="../assets/images/Safe Haven.jpg" alt="SafeHaven" class="w3-left w3-margin-right" style="width:50px">
                                    <span class="w3-large">Safe Haven</span>
                                    <br>
                                    <span>2013</span>
                                </li>
                                <li class="w3-padding-16">
                                    <img src="../assets/images/A Walk to Remember.jpeg" alt="AWalktoRemember" class="w3-left w3-margin-right" style="width:50px">
                                    <span class="w3-large">A Walk to Remember</span>
                                    <br>
                                    <span>2002</span>
                                </li>
                                <li class="w3-padding-16">
                                    <img src="../assets/images/The Notebook.jpeg" alt="TheNotebook" class="w3-left w3-margin-right w3-sepia" style="width:50px">
                                    <span class="w3-large">The Notebook</span>
                                    <br>
                                    <span>2004</span>
                                </li>
                            </ul>
                        </div>
                        <hr>

                        <!-- Advertising -->
                        <div class="w3-white w3-margin">
                            <div class="w3-container w3-padding w3-black">
                                <h4>Advertise</h4>
                            </div>
                            <div class="w3-container w3-white">
                                <div class="w3-container w3-display-container w3-light-grey w3-section" style="height:200px">
                                    <span class="w3-display-middle"><img src="../assets/images/Ad.png" /></span>
                                </div>
                            </div>
                        </div>
                        <hr>

                   
                        <hr>


                        <hr>

                        <div class="w3-white w3-margin">
                            <div class="w3-container w3-padding w3-black">
                                <h4>Follow Him</h4>
                            </div>
                            <div class="w3-container w3-xlarge w3-padding">
                                <i class="fa fa-facebook-official w3-hover-text-indigo"></i>
                                <i class="fa fa-instagram w3-hover-text-purple"></i>
                                <i class="fa fa-snapchat w3-hover-text-yellow"></i>
                                <i class="fa fa-pinterest-p w3-hover-text-red"></i>
                                <i class="fa fa-twitter w3-hover-text-light-blue"></i>
                                <i class="fa fa-linkedin w3-hover-text-indigo"></i>
                            </div>
                        </div>
                        <hr>

                        <!-- END About/Intro Menu -->
                    </div>

                    <!-- END GRID -->
                </div>

                <!-- END w3-content -->
            </div>

            <!-- Subscribe Modal -->
            <div id="subscribe" class="w3-modal w3-animate-opacity">
                <div class="w3-modal-content w3-padding-jumbo">
                    <div class="w3-container w3-white">
                        <i onclick="document.getElementById('subscribe').style.display='none'" class="fa fa-remove w3-xlarge w3-closebtn w3-hover-text-grey w3-margin"></i>
                        <h2 class="w3-wide">SUBSCRIBE</h2>
                        <p>Join my mailing list to receive updates on the latest blog posts and other things.</p>
                        <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
                        <button type="button" class="w3-btn-block w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('subscribe').style.display='none'">Subscribe</button>
                    </div>
                </div>
            </div>
</body>
SideBar;
    }

    /**
     * Creates the bottom part of the page.  This will usually be the footer area and anything else that comes below
     * the page content.
     *
     */
    public static function pageBottom()
    {
        echo <<<pagebottom
         <!-- Footer -->
         <div class="w3-padding-32 w3-padding-xlarge">
                <a href="#" class="w3-btn w3-padding-large w3-margin-bottom"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
                <p>Contact Information: 654.665.6499 | fans@yahoo.com </p>
                 <p>© 2015 | All Rights Resevered</p>
             </div>
            </footer>
</html>
pagebottom;
    }
}