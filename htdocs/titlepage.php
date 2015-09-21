<?php
     session_start();
     if (isset($_SESSION['username']))
     {
         header('Location: /ParkingLots/welcome.php');
     }
     else{
     }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example that shows off a responsive product landing page.">

    <title>Landing Page</title>

    


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">



<!--[if lte IE 8]>
  
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
  
<![endif]-->
<!--[if gt IE 8]><!-->
  
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
  
<!--<![endif]-->



<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">



  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="css/layouts/marketing.css">
    <!--<![endif]-->
  


    

    

</head>
<body>









<div class="header">
    <div class="home-menu pure-menu pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="index.html">Klein Oak Parking Spots</a>
    </div>
</div>

<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head">Begin Working</h1>
        <p class="splash-subhead">
            The button below will lead you to the login form.
        </p>
        <p>
            <a href="#login" class="pure-button pure-button-primary">Get Started</a>
        </p>
    </div>
</div>

<div class="content-wrapper">

    <div class="ribbon l-box-lrg pure-g">
        <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
            <img class="pure-img-responsive" alt="File Icons" width="300" src="img/common/file-icons.png">
        </div>
        <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">
            <style type="text/css">
                .link{
                    text-decoration: none;
                    color:#666666;
                }

                a:hover{
                    color: #000000;
                }
            </style>
            <h2 class="content-head content-head-ribbon">Development</h2>
            <p>
                This website was made using Pure CSS. Special thanks to their framework that allows this site and its applications to be possible.
            </p>
            <p> PureCSS: <a href="purecss.io" class="link">Website</a></p>
        </div>
    </div>

<a name="login">
    <div class="content">
        <h2 class="content-head is-center">Login</h2>

        <div class="pure-g">
            <div class="l-box-lrg pure-u-1 pure-u-md-2-5">
                <form class="pure-form pure-form-stacked" action='login.php' method='POST'>
                    <fieldset>
                        
                        <label for="username">Username</label>
                        <input id="username" type='text' name = 'username' placeholder="Username">
                        <label for="password">Password</label>
                        <input id="password" type='password' name = 'password' placeholder="Password">
                        <input type='submit' value='Log in' name = 'submit' class="pure-button">
                    </fieldset>
                </form>
            </div>

            <div class="l-box-lrg pure-u-1 pure-u-md-3-5">
                <h4>Contact Me</h4>
                <p>
                    Kurtis David
                </p>
                <p>
                    Email: kurtis.david@live.com
                </p>

                <h4>More Information</h4>
                <p>
                    If you need any help, please contact the developer above.
                </p>
            </div>
        </div>

    </div>
</a>

    <div class="footer l-box is-center">
        View the source of this layout to learn more. Made with love by the YUI Team.
    </div>

</div>






</body>
</html>


