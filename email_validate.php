<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <meta name="theme-color" content="#2196F3">
    <title>Email id verified-globalpdfs.com</title>

    <!-- CSS  -->
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<!--angular js-->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

<style>
html, body {
    font-family: Verdana,sans-serif;
    font-size: 15px;
    line-height: 1.5;
    color:white;
    background-color: #222;
}
.w3-btn, .w3-btn-block {
    border: none;
    display: inline-block;
    outline: 0;
    padding: 6px 16px;
    vertical-align: middle;
    overflow: hidden;
    text-decoration: none !important;
    color: #fff;
    /* background-color: #000; */
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
}
</style>
</head>


<body id="top" class="scrollspy" >

<!-- Pre Loader -->

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!--Navigation-->
 
 <div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="index.html" id="logo-container" class="brand-logo">Global pdfs</a>
                <ul class="right hide-on-med-and-down">
				   
                    <li><a href="about.html">About Us</a></li>
                        <li><a href="termsandpolicies.html">Terms and Policies</a></li>
                <li><a href="contact.html">Contact us</a></li>
                  </ul>
                <ul id="nav-mobile" class="side-nav">
                     <li><a href="about.html">About Us</a></li>
                         <li><a href="termsandpolicies.html">Terms and Policies</a></li>
                     <li><a href="contact.html">Contact us</a></li>
           
                 
				 </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>
 
<br><BR>
<div class="container" align="center" >
<?php
include 'db.php';	
session_start();

$hash=$_GET['hash'];
$qry="select email_verify,email from admins where hash='$hash'";
$row=mysql_query($qry,$conn);
while($value=mysql_fetch_array($row))
{
if( $value[0] == 0)
{
$qry1="update admins set email_verify='1' where hash='$hash'";
$row1=mysql_query($qry1,$conn);
echo "<button class='w3-btn w3-green w3-large'>Account succesffuly verified</button>";
$_SESSION["email"] = $value[1];
echo "<script language='javascript'>location.href='admin.html';</script>";
}
else{
echo "<button class='w3-btn w3-green w3-large' >Email is already active</button>";
$_SESSION["email"] = $value[1];
echo "<script language='javascript'>location.href='admin.html';</script>";

}
}
?>
</div>
<br>
<!--footer-->

<footer id="contact" class="page-footer default_color scrollspy">
    <div class="container">  
        <div class="row">
            <div class="col l6 s12">
		
               </div>
            <div class="col l5 s12">
                <h5 class="white-text">www.globalpdfs.com</h5>
                <ul>
                   <li><a class="white-text" href="about.html">About Us</a></li>
                    <li><a class="white-text" href="contact.html">Contact</a></li>
                      <li><a class="white-text" href="termsandpolicies.html">Terms and Policies</a></li>
                
			</ul>
            </div>
            <div class="col l5 s12">
                <h5 class="white-text">Like us on Facebook</h5>
                <ul>
                  
                    <li>
                       
                       <div class="fb-page"
  data-href="https://www.facebook.com/globalpdfs" 
  data-width="340"
  data-hide-cover="false"
  data-show-facepile="true"></div>
                       </li>
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright default_color">
            <div class="container">
            © 2016 Copyright www.globalpdfs.com 
            <a class="grey-text text-lighten-4 right" href="#!">www.globalpdfs.com</a>
            </div>
        
</footer>






   <script src="min/plugin-min.js"></script>
    <script src="min/custom-min.js"></script>

</body>
</html>