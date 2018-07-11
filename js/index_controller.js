// Declare app level module which depends on filters, and services
var myApp = angular.module('gp', ['countTo']);
myApp.controller('gp_ctrl', function ($scope, $http) {

 
    $scope.countFrom = 0;

var notes_count = $http({
	method: "post",
	url: "notes_count.php",
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});	
notes_count.success(function (data) {
$scope.notes_counting = data;
	
});


$scope.add_downloads=function(notes_link) 
{
 $http({
	method: "post",
	url: "add_downloads.php",
	data :{
	notes_link : notes_link
	},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	}).success(function (data) {

	var notes_count = $http({
	method: "post",
	url: "notes_count.php",
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});	
notes_count.success(function (data) {
$scope.notes_counting = data;
	
});
});

}
$scope.search_subject=function()
{
	document.getElementById("search_button").value="Loading Notes";
	
 $http({
method: "post",
url:"search_sub.php",
data: {
	search : $scope.search_sub
},	
headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
}).success(function (data) 
{
	$scope.notes_download=data;
	if($scope.notes_download=="")
	{
	alert("Notes not yet uploaded for this subject");
	}
	document.getElementById('search_button').value="Search";
	
	});	
}

$scope.fp_open_modal=function() 
{
document.getElementById('fp_open').style.height = '100%';
  
  document.getElementById('signup_open').style.height = '0%';
    document.getElementById('login_open').style.height = '0%';
   
 
 }
 $scope.fp_close_modal=function() 
{
document.getElementById('fp_open').style.height = '0%';
  
  document.getElementById('signup_open').style.height = '0%';
    document.getElementById('login_open').style.height = '0%';
   
 
 }
 $scope.signup_open_modal=function() 
{
       document.getElementById('signup_open').style.height = '100%';
  document.getElementById('login_open').style.height = '0%';
   document.getElementById('fp_open').style.height = '0%';
 
    
  }
    $scope.signup_close_modal=function()
   {
    document.getElementById('signup_open').style.height = '0%';
    document.getElementById('login_open').style.height = '0%';
       document.getElementById('fp_open').style.height = '0%';
 
     
}
$scope.login_open_modal=function() 
{
       document.getElementById('login_open').style.height = '100%';
  document.getElementById('signup_open').style.height = '0%';
     document.getElementById('fp_open').style.height = '0%';
 
    
  }
    $scope.login_close_modal=function()
   {
    document.getElementById('login_open').style.height = '0%';
    document.getElementById('signup_open').style.height = '0%';
       document.getElementById('fp_open').style.height = '0%';
 
     
}
  $scope.login_func=function()
	{
		
var request = $http({
	method: "post",
	url: "login.php",
	data: {login_email: $scope.login_email,login_password : $scope.login_password},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});
		document.getElementById("login_button").value="Logging you in";
	
request.success(function (data) {
if(data=="1")
	{
		$.toaster({ message : ' <br>Welcome Admin', title : 'login Successfull', priority : 'success' });
			document.getElementById("login_button").value="Logged-in";
	
		location.href="admin.html";
	}
	else
	{
		$.toaster({ message : ' <br>Incorrect Username or password', title : 'login unsuccessfull', priority : 'warning' });
			document.getElementById("login_button").value="Log-In";
	
	}
});
}

  $scope.signup_func=function()
	{
		document.getElementById("signup_button").value="Creating your account";
	
var request = $http({
	method: "post",
	url: "signup.php",
	data: {name: $scope.name,email: $scope.email,gp_password : $scope.gp_password},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});
		
request.success(function (data) {
	if(data=="-1")
	{
		$.toaster({ message : ' <br>E-mail id already exists', title : 'Signup Successfull', priority : 'success' });
		document.getElementById("email_exist").innerHTML="Email id already exists ";
			document.getElementById("signup_button").value="Sign up";
	
	}
	else if(data=="1")
	{
		$.toaster({ message : ' <br>Please check your email to verify your accont', title : 'Signup Successfull', priority : 'success' });
		  document.getElementById('signup_open').style.height = '0%';
  			document.getElementById("signup_button").value="Sign up";
	
	}
	else
	{
		$.toaster({ message : ' <br>Please signup again', title : 'Signup unsuccessfull', priority : 'warning' });
		document.getElementById("signup_button").value="Sign up";
	
	}
});
}

   
   
   $scope.fp_func=function()
	{
		document.getElementById("fp_button").value="Sending you password";
	
var request = $http({
	method: "post",
	url: "fp.php",
	data: {
	email: $scope.fp_email
	},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});
		
request.success(function (data) {
	if(data=="-1")
	{
		$.toaster({ message : ' <br>E-mail id doent exists', title : 'Password cannot be sent', priority : 'success' });
		document.getElementById("fp_email_exist").innerHTML="Email id doesnt exists ";
			document.getElementById("fp_button").value="Send Password";
	
	}
	else if(data=="1")
	{
		$.toaster({ message : ' <br>Please check your email to retreive your password', title : 'Password sent to email', priority : 'success' });
		  document.getElementById('fp_open').style.height = '0%';
  			document.getElementById("fp_button").value="Send Password";
	
	}
	
});
}
   
});