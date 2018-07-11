var app = angular.module('contact_form', []);
app.controller('contact_form_ctrl', function ($scope, $http){
    $scope.contact_func=function()
	{
	var request = $http({
method: "post",
url:"contact.php",
data: {
name: $scope.name,
email: $scope.email,
comments: $scope.comments
},
headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});
		document.getElementById("contact_button").value="Contacting";

request.success(function (data) {
	
if(data == "1"){
	$.toaster({ message : ' <br>we will definitely respond you if necessary', title : 'Thank you for contacting', priority : 'success' });
			document.getElementById("contact_button").value="Contact";

	}
else {
$.toaster({ message : 'There was a problem in contact form , please try again', title : 'We are Sorry', priority : 'success' });

}
});
}
})


