var admin_app = angular.module('admin', ['ngFileUpload']);
admin_app.controller('admin_ctrl',['$http','$scope', 'Upload', '$timeout', function ($http, $scope, Upload, $timeout) 
{
  var request = $http({
	method: "post",
	url: "session_check.php",
	data: {},
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
	});
		
request.success(function (data) {
if(data == "0")
	{
	alert("Please Log in again");
	location.href="index.html";
	
	
		}
	
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
 	
  $scope.uploadPic = function(file,notes_name,notes_id) {
    file.upload = Upload.upload({
	  method:'post',
      url: 'upload_notes.php',
   data: {notes_name : notes_name, notes: file},	
	headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
	});
	document.getElementById("upload_button_"+notes_id).value="uploading";
	document.getElementById("upload_button_"+notes_id).style.background="red";

    file.upload.success(function (data) {

if(data=="-1")
{
document.getElementById("upload_button_"+notes_id).value="Invalid format";
	
}
else if(data=="1")
{
document.getElementById("upload_button_"+notes_id).value="uploaded";
document.getElementById("upload_button_"+notes_id).style.background="green";

}
else{
document.getElementById("upload_button_"+notes_id).value="Failed to Upload";
document.getElementById("upload_button_"+notes_id).style.background="red";

}

});
    }
}])

