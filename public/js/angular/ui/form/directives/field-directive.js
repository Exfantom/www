(function () {
'use strict';

		// coffeescript's for in loop
		var __indexOf = [].indexOf || function(item) {
				for (var i = 0, l = this.length; i < l; i++) {
					if (i in this && this[i] === item) return i;
				}
				return -1;
			};

		angular.module('ui.view')
		.directive('fieldDirective', function($http, $compile) {

			var getTemplateUrl = function(field) {
				var type = field.type;
				var templateUrl = '/js/angular/ui/form/views/directive-templates/field/';
				var supported_fields = [
					'textfield',
					'email',
					'textarea',
					'checkbox',
					'date',
					'dropdown',
					'hidden',
					'password',
					'radio',
					'Editor2',
					'timestamp',
					'int'
				]

				if (__indexOf.call(supported_fields, type) >= 0) {
					return templateUrl += type + '.html';
				}
				type = 'int';
				return templateUrl += type + '.html';
			}

			var linker = function(scope, element) {
				// GET template content from path
				console.log(scope.field);
				var templateUrl = getTemplateUrl(scope.field);
				console.log(templateUrl);
				if (templateUrl)
				$http.get(templateUrl).success(function(data) {
					element.html(data);
					if (scope.field.type == 'Editor2')
					CKEDITOR.replace( 'editor1' );
					$compile(element.contents())(scope);
				});
			}

			return {
				template: '<div ng-bind="field"></div>',
				restrict: 'E',
				scope: {
					field: '='
				},
				link: linker
			};
		});

})();