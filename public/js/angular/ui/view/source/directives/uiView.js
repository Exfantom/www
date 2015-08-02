(function () {
  'use strict';

  angular.module('ui.view')
    .directive('adminview', ['viewConfig', '$window',
      function (viewConfig, $window) {
        return {		  
          restrict: 'A',
          //scope: {view:"=viewdata"},
		  scope: true,
		  template: '<ng-include src="getTemplateUrl()"/>',
          controller: function($scope) {
						  //function used on the ng-include to resolve the template
						  $scope.getTemplateUrl = function() {
								var TemplateBaseUrl = '/js/angular/ui/view/views/directive-templates/';
								console.log('111');								
								return TemplateBaseUrl+"view_"+$scope.data.type+"_renderer.html";
						  }
						},  
          link: function (scope, element, attrs, ctrl) {
			console.log('link in directive uiView');
			
            var config__ = {};		

            angular.extend(config__, viewConfig);
            if (config__.viewConfig) {
              //element.addClass(config.viewConfig);
            }
          }
        };
      }
    ]);
})();
