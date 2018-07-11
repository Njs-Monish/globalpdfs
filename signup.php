<?php 
include 'db.php';
	
$POSTDATA = FILE_GET_CONTENTS("PHP://INPUT");
$REQUEST = JSON_DECODE($POSTDATA);
$name = $REQUEST->name;
$email = $REQUEST->email;
$password= $REQUEST->gp_password;

$qry1="select email from admins where email='$email'";
$row1=mysql_query($qry1,$conn);

$r1=mysql_fetch_array($row1);

	
if($r1[0] != "")
{	
	echo "-1";
}
else
{
$hash=substr(md5(uniqid(rand(), true)), 16, 16);
$qry="insert into admins (name,email,password,hash)values('$name','$email','$password','$hash')";
$row=mysql_query($qry,$conn);
if($row)
	{
  require_once ('/home/globalpd/public_html/PHPMailer_5.2.0/class.phpmailer.php');

$mail = new PHPMailer();
$mail = new PHPMailer(true);

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 25;
$mail->Host = "globalpdfs.com"; // SMTP server
$mail->Username = "globalpd"; // SMTP account username
$mail->Password = "monish#123#"; // SMTP account password

$mail->From = "admin@globalpdfs.com";
$mail->FromName = "Sign-up Verification";
$mail->AddAddress($email);// Receiving Mail ID, it can be either domain mail id (or ) any other mail id i.e., gmail id
$mail->Subject ="One more steps to create your account !!!";
$mail->AltBody = "";
$mail->WordWrap = 80;


$body ="
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional //EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'><head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <!--[if !mso]><!--><meta http-equiv='X-UA-Compatible' content='IE=edge' /><!--<![endif]-->
    <meta name='viewport' content='width=device-width' />
    <title> </title>
    <style type='text/css'>

.wrapper a:hover {
  text-decoration: none !important;
}
.btn a:hover,
.footer__links a:hover {
  opacity: 0.8;
}
.wrapper .footer__share-button:hover {
  color: #ffffff !important;
  opacity: 0.8;
}
a[x-apple-data-detectors] {
  color: inherit !important;
  text-decoration: none !important;
  font-size: inherit !important;
  font-family: inherit !important;
  font-weight: inherit !important;
  line-height: inherit !important;
}
.column {
  padding: 0;
  text-align: left;
  vertical-align: top;
}
.mso .font-avenir,
.mso .font-cabin,
.mso .font-open-sans,
.mso .font-ubuntu {
  font-family: sans-serif !important;
}
.mso .font-bitter,
.mso .font-merriweather,
.mso .font-pt-serif {
  font-family: Georgia, serif !important;
}
.mso .font-lato,
.mso .font-roboto {
  font-family: Tahoma, sans-serif !important;
}
.mso .font-pt-sans {
  font-family: 'Trebuchet MS', sans-serif !important;
}
.mso .footer p {
  margin: 0;
}
@media only screen and (max-width: 620px) {
  .wrapper .size-18,
  .wrapper .size-20 {
    font-size: 17px !important;
    line-height: 26px !important;
  }
  .wrapper .size-22 {
    font-size: 18px !important;
    line-height: 26px !important;
  }
  .wrapper .size-24 {
    font-size: 20px !important;
    line-height: 28px !important;
  }
  .wrapper .size-26 {
    font-size: 22px !important;
    line-height: 31px !important;
  }
  .wrapper .size-28 {
    font-size: 24px !important;
    line-height: 32px !important;
  }
  .wrapper .size-30 {
    font-size: 26px !important;
    line-height: 34px !important;
  }
  .wrapper .size-32 {
    font-size: 28px !important;
    line-height: 36px !important;
  }
  .wrapper .size-34,
  .wrapper .size-36 {
    font-size: 30px !important;
    line-height: 38px !important;
  }
  .wrapper .size-40 {
    font-size: 32px !important;
    line-height: 40px !important;
  }
  .wrapper .size-44 {
    font-size: 34px !important;
    line-height: 43px !important;
  }
  .wrapper .size-48 {
    font-size: 36px !important;
    line-height: 43px !important;
  }
  .wrapper .size-56 {
    font-size: 40px !important;
    line-height: 47px !important;
  }
  .wrapper .size-64 {
    font-size: 44px !important;
    line-height: 50px !important;
  }
  .divider {
    Margin-left: auto !important;
    Margin-right: auto !important;
  }
  .btn a {
    display: block !important;
    font-size: 14px !important;
    line-height: 24px !important;
    padding: 12px 10px !important;
    width: auto !important;
  }
  .btn--shadow a {
    padding: 12px 10px 13px 10px !important;
  }
  .image img {
    height: auto;
    width: 100%;
  }
  .layout,
  .column,
  .preheader__webversion,
  .header td,
  .footer,
  .footer__left,
  .footer__right,
  .footer__inner {
    width: 320px !important;
  }
  .preheader__snippet,
  .layout__edges {
    display: none !important;
  }
  .preheader__webversion {
    text-align: center !important;
  }
  .header__logo {
    Margin-left: 20px;
    Margin-right: 20px;
  }
  .layout--full-width {
    width: 100% !important;
  }
  .layout--full-width tbody,
  .layout--full-width tr {
    display: table;
    Margin-left: auto;
    Margin-right: auto;
    width: 320px;
  }
  .column,
  .layout__gutter,
  .footer__left,
  .footer__right {
    display: block;
    Float: left;
  }
  .footer__inner {
    text-align: center;
  }
  .footer__links {
    Float: none;
    Margin-left: auto;
    Margin-right: auto;
  }
  .footer__right p,
  .footer__share-button {
    display: inline-block;
  }
  .layout__gutter {
    font-size: 20px;
    line-height: 20px;
  }
  .layout--no-gutter.layout--has-border:not(.layout--full-width),
  .layout--has-gutter.layout--has-border .column__background {
    width: 322px !important;
  }
  .layout--has-gutter.layout--has-border {
    left: -1px;
    position: relative;
  }
}
@media only screen and (max-width: 320px) {
  .border {
    display: none;
  }
  .layout--no-gutter.layout--has-border:not(.layout--full-width),
  .layout--has-gutter.layout--has-border .column__background {
    width: 320px !important;
  }
  .layout--has-gutter.layout--has-border {
    left: 0 !important;
  }
}
</style>
    
  <!--[if !mso]><!--><style type='text/css'>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,700,400italic,700italic);
</style><link href='https://fonts.googleapis.com/css?family=Roboto:400,700,400italic,700italic' rel='stylesheet' type='text/css' /><!--<![endif]--><style type='text/css'>
body,.wrapper{background-color:#1e1e1e}.wrapper h1{color:#d49344;font-size:26px;line-height:34px}.wrapper h2{color:#d49344;font-size:20px;line-height:28px}.wrapper h3{color:#707f8f;font-size:16px;line-height:24px}.wrapper a{color:#d49344}.wrapper a:hover{color:#915e21 !important}@media only screen and (max-width: 620px){.wrapper h1{}.wrapper h1{font-size:22px;line-height:31px}.wrapper h2{}.wrapper h2{font-size:17px;line-height:26px}.wrapper h3{}.wrapper p{}}.column,.column__background td{color:#fff;font-size:14px;line-height:21px}.column,.column__background td{font-family:Roboto,Tahoma,sans-serif}.mso .column,.mso .column__background td{font-family:Tahoma,sans-serif !important}.border{background-color:#000}.layout--no-gutter.layout--has-border:not(.layout--full-width),.layout--has-gutter.layout--has-border .column__background,.layout--full-width.layout--has-border{border-top:1px solid 
#000;border-bottom:1px solid #000}.wrapper blockquote{border-left:4px solid #000}.divider{background-color:#000}.wrapper .btn a{color:#fff}.wrapper .btn a{font-family:Roboto,Tahoma,sans-serif}.mso .wrapper .btn a{font-family:Tahoma,sans-serif !important}.wrapper .btn a:hover{color:#fff !important}.btn--flat a,.btn--shadow a,.btn--depth a{background-color:#4c5b6b}.btn--ghost a{border:1px solid #4c5b6b}.preheader--inline,.footer__left{color:#e8e8e8}.preheader--inline,.footer__left{font-family:Avenir,sans-serif}.mso .preheader--inline,.mso .footer__left{font-family:sans-serif !important}.wrapper .preheader--inline a,.wrapper .footer__left a{color:#e8e8e8}.wrapper .preheader--inline a:hover,.wrapper .footer__left a:hover{color:#e8e8e8 !important}.header__logo{color:#c3ced9}.header__logo{font-family:Roboto,Tahoma,sans-serif}.mso .header__logo{font-family:Tahoma,sans-serif !important}.wrapper 
.header__logo a{color:#c3ced9}.wrapper .header__logo a:hover{color:#fff !important}.footer__share-button{background-color:#0f0f0f}.footer__share-button{font-family:Avenir,sans-serif}.mso .footer__share-button{font-family:sans-serif !important}.layout__separator--inline{font-size:20px;line-height:20px;mso-line-height-rule:exactly}
</style><meta name='robots' content='noindex,nofollow' />
<meta property='og:title' content='My First Campaign' />
</head>
<!--[if mso]>
  <body class='mso'>
<![endif]-->
<!--[if !mso]><!-->
  <body class='half-padding' style='margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #1e1e1e;'>
<!--<![endif]-->
    <div class='wrapper' style='background-color: #F36221 ;'>
      
      <table class='layout layout--no-gutter' style='border-collapse: collapse;table-layout: fixed;Margin-left: auto;Margin-right: auto;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #212a32;' align='center'>
        <tbody><tr>
          <td class='column' style='padding: 0;text-align: left;vertical-align: top;color: #fff;font-size: 14px;line-height: 21px;font-family: Roboto,Tahoma,sans-serif;' width='600'>
    
      
            <div style='Margin-left: 20px;Margin-right: 20px;Margin-top: 20px;'>
      <div style='line-height:10px;font-size:1px'>&nbsp;</div>
    </div>
    
            <div style='Margin-left: 20px;Margin-right: 20px;'>
      
<h3 style='Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #707f8f;font-size: 16px;line-height: 24px;text-align: center;'>
<a href='http://www.globalpdfs.com' style='Margin-top: 0;text-decoration:none;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #707f8f;font-size: 16px;line-height: 24px;text-align: center;'>www.globalpdfs.com</a></h3>
<h1 class='size-30' style='Margin-top: 12px;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #d49344;font-size: 30px;line-height: 38px;text-align: center;'>
Upload notes and serve Knowledge</h1>
</div>
    
            <div style='Margin-left: 20px;Margin-right: 20px;'>
      <div style='line-height:10px;font-size:1px'>&nbsp;</div>
    </div>
    
            <div style='Margin-left: 20px;Margin-right: 20px;'>
      <div class='btn btn--flat' style='Margin-bottom: 20px;text-align: center;'>
        <![if !mso]><a style='border-radius: 4px;display: inline-block;font-weight: bold;text-align: center;text-decoration: none !important;transition: opacity 0.1s ease-in;color: #fff;background-color: #CA2626;font-family: Roboto, Tahoma, sans-serif;font-size: 14px;line-height: 24px;padding: 12px 35px;' id='email_validate' href='http://www.globalpdfs.com/email_validate.php?hash=".$hash."'>Verify your account</a><![endif]>
		
    </div>
	<p class='size-16' style='Margin-top: 20px;Margin-bottom: 0;font-size: 16px;line-height: 24px;'>
	Once you create your account Log into your account and upload notes :)
	[Update your designation and instuition once you login into your account]
</p>

    
            <div style='Margin-left: 20px;Margin-right: 20px;'>
      <div style='line-height:5px;font-size:1px'>&nbsp;</div>
    </div>
    
            <div style='Margin-left: 20px;Margin-right: 20px;Margin-bottom: 12px;'>
      <div style='line-height:20px;font-size:1px'>&nbsp;</div>
    </div>
    
          </td>
        </tr>
      </tbody></table>
  
      <div style='font-size: 20px;line-height: 20px;mso-line-height-rule: exactly;'>&nbsp;</div>
    
      <table class='footer' style='border-collapse: collapse;table-layout: fixed;Margin-right: auto;Margin-left: auto;border-spacing: 0;' width='600' align='center'>
        <tbody><tr>
          <td style='padding: 0 0 40px 0;'>
            <table class='footer__left' style='border-collapse: collapse;table-layout: fixed;border-spacing: 0;color: #e8e8e8;font-family: Avenir,sans-serif;' width='400'>
              <tbody><tr>
                <td class='footer__inner' style='padding: 0;font-size: 12px;line-height: 19px;'>
                  
                  <div>
                    
                  </div>
                  <div class='footer__permission' style='Margin-top: 18px;'>
                    
                  </div>
                  <div>
                    <span><preferences lang='en'><a href='http://www.globalpdfs.com/about.html'>About Us</a></preferences>&nbsp;&nbsp;|&nbsp;&nbsp;</span><unsubscribe><a href='http://www.globalpdfs.com/termsandpolicies.html'>Terms and Policies</a></unsubscribe>&nbsp;&nbsp;|&nbsp;&nbsp;<span><preferences lang='en'><a href='http://www.globalpdfs.com/contact.html'>Contact Us</a></preferences></span>
                 
				 </div>
                </td>
              </tr>
            </tbody></table>
          </td>
        </tr>
      </tbody></table>
      <badge>
        
      </badge>
    </div>
  
</body></html>

";			

 
$mail->MsgHTML($body);
$mail->IsHTML(true);
if(!$mail->send())
{
echo "error";
}
else {
echo "1";
}

	

	}
else
	{
		echo "0";
	}
}

 ?>
