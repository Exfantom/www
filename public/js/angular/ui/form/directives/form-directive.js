(function () {
'use strict';

	angular.module('ui.view')
		.directive('formDirective', function () {
		return {
			controller: function($scope){
				$scope.submit = function(){
					alert('Form submitted..');
					$scope.form.submitted = true;
				}

				$scope.cancel = function(){
					alert('Form canceled..');
				}
			},
			templateUrl: '/js/angular/ui/form/views/directive-templates/form/form.html',
			restrict: 'E',
			scope: {
				form:'='
			}
		};
	  });
})();