var admin_app = angular.module('admin', ['ngFileUpload']);
admin_app.controller('admin_ctrl',['$http','$scope', 'Upload', '$timeout', function ($http, $scope, Upload, $timeout) 
{
  
   var session_check = $http({
	method: "post",
	url: "session_check.php",
	data: {},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});	
session_check.success(function (data) {
if(data == "0")
	{
	alert("Your session has been expired , Please Login Again");
	location.href="index.html";		
		}
	
});
  $scope.logout = function()
  {
  
  var session_destroy = $http({
	method: "post",
	url: "session_destroy.php",
	data: {},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});	
session_destroy.success(function (data) {

	alert("Keep uploading more notes and serve knowledge,Thank you");
	location.href="index.html";		
		
	
});
  }
$scope.notes = [{id: 'notes1'}];
  
  $scope.addNewnote = function() {
    var newItemNo = $scope.notes.length+1;
    $scope.notes.push({'id':'notes'+newItemNo});
  };
    
  $scope.removenote = function() {
    var lastItem = $scope.notes.length-1;
    $scope.notes.splice(lastItem);
  };
  $http({
method: "post",
url:"get_subjectnames.php",
headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
}).success(function (data) 
{
	$scope.sub=data;
	
	
	});
	$http({
method: "post",
url:"profile_details.php",
headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
}).success(function (data1) 
{
	$scope.profile=data1;
	$scope.update_name=$scope.profile[0].name;
	$scope.update_password=$scope.profile[0].password;
	$scope.update_designation=$scope.profile[0].designation;
	$scope.update_ins=$scope.profile[0].instuition;
	
	
	});
$scope.notes = [{id: 'notes1'}];
  
  $scope.addNewnote = function() {
    var newItemNo = $scope.notes.length+1;
    $scope.notes.push({'id':'notes'+newItemNo});
  };
    
  $scope.removenote = function() {
    var lastItem = $scope.notes.length-1;
    $scope.notes.splice(lastItem);
  };
  
  
  
  $scope.update_func=function(update_name,update_password,update_designation,update_ins)
  {
  	 document.getElementById("update_button").value="Updating your profile";
	var session_check = $http({
	method: "post",
	url: "session_check.php",
	data: {},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});	
session_check.success(function (data) {
if(data == "1")
	{
	
	$http({
method: "post",
url:"update_profile.php",
data : {
	
	pro_name : update_name,
	pro_password : update_password,
	designation : update_designation,
	ins : update_ins


},
headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
}).success(function (data) 
{
$http({
method: "post",
url:"profile_details.php",
headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
}).success(function (data1) 
{
	$scope.profile=data1;
	$scope.update_name=$scope.profile[0].name;
	$scope.update_password=$scope.profile[0].password;
	$scope.update_designation=$scope.profile[0].designation;
	$scope.update_ins=$scope.profile[0].instuition;
	 document.getElementById("update_button").value="Profile Updated";
	
	
	});
 document.getElementById("update_button").value="Update Profile";
	
	
});
	
		}
		else{
		
		alert("Your session has been expired , Please Login Again");
	location.href="index.html";	
		}
	
});
  
}
  
  
 	$scope.add_subject =function()
	 {
		 document.getElementById("add_subject").value="Adding Subject .........";
		 var session_check = $http({
	method: "post",
	url: "session_check.php",
	data: {},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});	
session_check.success(function (data) {
if(data == "1")
	{
	 var add_sub = $http({
method: "post",
url:"add_subject.php",
data: {
sub_name: $scope.sub_name
},
headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
}).success(function (data) 
{
			 document.getElementById("add_subject").value="Add Subject";

 $http({
method: "post",
url:"get_subjectnames.php",
headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
}).success(function (data) 
{
	$scope.sub=data;
	});
});
}
else{
	alert("Your session has been expired , Please Login Again");
	location.href="index.html";	


}
});
	 }
	 
	 $scope.get_notes =function(hash)
	 {
	  var session_check = $http({
	method: "post",
	url: "session_check.php",
	data: {},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});	
session_check.success(function (data) {
if(data == "1")
	{
	 $http({
method: "post",
url:"get_notes_name.php",
data: {
hash_notes: hash
},
headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
}).success(function (data) 
{
 $scope.notes_names=data;
});

}
else{

alert("Your session has been expired , Please Login Again");
	location.href="index.html";	

}
});

	 }
	  $scope.delete_notes =function(notes_name,sno,notes_link,extension)
	 {
	   var session_check = $http({
	method: "post",
	url: "session_check.php",
	data: {},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});	
session_check.success(function (data) {
if(data == "1")
	{

		 var i=confirm("Are you sure to delete "+ notes_name +" notes");
		 if(i==true)
		 {
	 var add_sub = $http({
method: "post",
url:"delete_notes_name.php",
data: {
sno: sno,
notes_link : notes_link,
extension : extension
},
headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
}).success(function (data) 
{
 document.getElementById(notes_name).style.display='none';
 });
		 }
		 }
		 else
		 {
		 alert("Your session has been expired , Please Login Again");
	location.href="index.html";	

		 }
		 });
	 }
	 
	 
	 $scope.upload_notes = function(file,notes_name,hash,notes_id) {
	   var session_check = $http({
	method: "post",
	url: "session_check.php",
	data: {},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});	
session_check.success(function (data) {
if(data == "1")
	{
    file.upload = Upload.upload({
	  method:'post',
      url: 'upload_notes.php',
   data: {
	   notes_name : notes_name, 
	   notes: file,
	   hash:hash,
	   note_id:notes_id
	},	
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
	});
	document.getElementById("upload_button_"+notes_id+"_"+hash).value="uploading";
	document.getElementById("upload_button_"+notes_id+"_"+hash).className = "btn btn-danger";

 file.upload.success(function (data) {

if(data=="-1")
{
document.getElementById("upload_button_"+notes_id+"_"+hash).value="Invalid format";
	document.getElementById("upload_button_"+notes_id+"_"+hash).className = "btn btn-danger";

}
else if(data=="1")
{
document.getElementById("upload_button_"+notes_id+"_"+hash).value="uploaded";
document.getElementById("upload_button_"+notes_id+"_"+hash).className = "btn btn-success";

}
else{
document.getElementById("upload_button_"+notes_id+"_"+hash).value="Failed to Upload";
document.getElementById("upload_button_"+notes_id+"_"+hash).className = "btn btn-danger";

}

});
}
else

{
 alert("Your session has been expired , Please Login Again");
	location.href="index.html";	

}
});
	 }
	 
	 
	 
	 
}])

