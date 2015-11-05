angular.module('application')
	.controller('controlPanel', ['$http', '$rootScope', function($http, $rootScope){
		var controller = this;
		controller.message = "";


		controller.Mashinerija = function(extend, succMsg, errMsg){
			var path = '/OS-projekt/php/' + extend + '.php';

			$http.get(path)
				.success(function(){
					controller.message = succMsg;
					controller.AlertBox(1);
					$rootScope.Update();
				})
				.error(function(){
					controller.message = errMsg;
					controller.AlertBox(0);
				})
		}

		controller.CleanTextFiles = function()
		{
			$http.get('/OS-projekt/php/clean-files.php')
				.success(function(){
					console.log("Success");
					$rootScope.Update();
				})
				.error(function(){
					console.log("error");
				})
		};

		controller.CleanTextFiles();

		controller.CheckDigitalSignature = function()
		{
			$http.get('/OS-projekt/php/check-digital-signature.php')
				.success(function(r){
					if(r == 'valid'){
						controller.message = "DIGITAL SIGNATURE IS VALID";
						controller.AlertBox(1);
					}
					else{
						controller.message = "DIGITAL SIGNATURE INVALID!";
						controller.AlertBox(0);
					}
				})
				.error(function(){
					controller.message = "Digital signature error";
					controller.AlertBox(0);
				})
		}		

		//ALERT BOX
		controller.box = $('.alert');	
		controller.AlertBox = function($valid)
		{
			var alert = $valid ? $(controller.box).removeClass('alert-danger').addClass('alert-success')
				: $(controller.box).removeClass('alert-success').addClass('alert-danger');
   			alert.fadeToggle(200);
			controller.box.removeClass('hide');
   			window.setTimeout(function() { alert.fadeToggle(200) }, 2000);
		};
	}]);