angular.module('application')
	.controller('fileCtrl', ['$http', '$rootScope', function($http, $rootScope){
		var controller = this;
		controller.text = "";
		$rootScope.Update = function(){
			$http.get('/OS-projekt/php/get-file-text.php?file=' + controller.key)
				.success(function(response){
					controller.text = response;
					console.log(controller.key);
				})
				.error(function(){
					console.log("Error");
				})
		}
		controller.Save = function(){
			var data = { 'fileName' : controller.key, 'newText' : controller.text };
			$http.post('/OS-projekt/php/save-text.php', data)
				.success(function(response){
					console.log(response);
				})
				.error(function(){
					console.log("Error");
				})
		}
	}]);