(function () {
  'use strict';

  angular.module('demoApp', ['ui.tree','ui.view'])
	.factory( '$mediator', function( $rootScope ) {
	        return $rootScope.$new( true ); 
	    })
    .controller('BasicExampleCtrl', ['$scope','$http', function ($scope, $http) {
      $scope.remove = function(scope) {
        scope.remove();
      };

      $scope.toggle = function(scope) {
        scope.toggle();
      };
	  
		$scope.viewSubItem = function(scope) {
			var nodeData = scope.$modelValue;
			//console.log(scope);
			scope.viewRun(nodeData);
		};	  

      $scope.moveLastToTheBeginning = function () {
        var a = $scope.data.pop();
        $scope.data.splice(0,0, a);
      };

      $scope.newSubItem = function(scope) {
        var nodeData = scope.$modelValue;
        nodeData.nodes.push({
          id: nodeData.id * 10 + nodeData.nodes.length,
          title: nodeData.title + '.' + (nodeData.nodes.length + 1),
          nodes: []
        });
      };

      $scope.collapseAll = function() {
        $scope.$broadcast('collapseAll');
      };

      $scope.expandAll = function() {
        $scope.$broadcast('expandAll');
      };

      $http.get('/admin/gettree/page').success(function(data) {
				console.log("success!");
				console.log(data);
				$scope.data = data;				
		}); 
	  
	  /*
	  $scope.data = [{
        "id": 1,
        "title": "node1",
        "nodes": [
          {
            "id": 11,
            "title": "node1.1",
            "nodes": [
              {
                "id": 111,
                "title": "node1.1.1",
                "nodes": []
              }
            ]
          },
          {
            "id": 12,
            "title": "node1.2",
            "nodes": []
          }
        ],
      }, {
        "id": 2,
        "title": "node2",
        "nodes": [
          {
            "id": 21,
            "title": "node2.1",
            "nodes": []
          },
          {
            "id": 22,
            "title": "node2.2",
            "nodes": []
          }
        ],
      }, {
        "id": 3,
        "title": "node3",
        "nodes": [
          {
            "id": 31,
            "title": "node3.1",
            "nodes": []
          }
        ],
      }];
	  */
	  
    }])
    .controller('ViewController', ['$scope', '$element','$http','$mediator',
      function ViewController($scope, $element,$http,$mediator) {

				//console.log($scope);
				
				$scope.viewRun = function(scope) {
					
					//console.log($mediator);
					$mediator.$emit( 'my:event', scope );
					//scope.loadViewData(scope);
					
				};
      }
    ]);		

}());