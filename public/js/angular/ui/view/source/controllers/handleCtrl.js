(function () {
  'use strict';

  angular.module('ui.view')

    .controller('ViewHandleController', ['$scope', '$element','$mediator','$http',
      function ($scope, $element,$mediator,$http) {
        this.scope = $scope;

			$scope.data = {};
			
			$scope.data.type = 'none';
			
			console.log('ViewHandleController');
			//console.log($scope);
			
			$mediator.$on( 'my:event', function( event, data ) {
					console.log(data);
					
						//data.title = '11111111';
						
					$http.get('/admin/getnodes/'+data.id).success(function(data) { 
							console.log("success!");
							console.log(data);
							$scope.data = data;

							$scope.data.type = 'list';
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
	  
			
				
			});			
			
			console.log($mediator);
			
			$scope.loadViewData = function(scope){
			
				console.log(scope);
			
			}
			
			$scope.viewItem = function(scope){
			
					var id = scope.node.id;
					
					
					$http.get('/admin/getcurrentnode/'+id).success(function(data) { 
							console.log("success!");
							console.log(data);
							$scope.data = data;

							$scope.data.type = 'view';
					});
					
			
			}

      }
    ]);
})();
