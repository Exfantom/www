<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>AngularJS UI Tree demo</title>

  <!-- Stylesheets -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ URL::asset('js/angular/ui/tree/source/angular-ui-tree.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('js/angular/ui/tree/examples/css/app.css') }}">
</head>

<body ng-app="demoApp">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="Brand" src="...">
      </a>
    </div>
  </div>
</nav>

<div class="container-fluid">

  <div class="row"  ng-controller="ViewController">
    <div class="col-sm-4" ng-include="'/js/angular/ui/tree/examples/views/basic-example.html'"></div>
	<div class="col-sm-8" ng-include="'/js/angular/ui/view/views/basic-example.html'"></div>
  </div>

</div>

<!-- JavaScript -->
<!--[if IE 8]>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/es5-shim/3.4.0/es5-shim.min.js"></script>
<![endif]-->

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.2/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.2/angular-route.min.js"></script>

<script src="{{ URL::asset('js/angular/ui/tree/source/main.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/tree/source/controllers/handleCtrl.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/tree/source/controllers/nodeCtrl.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/tree/source/controllers/nodesCtrl.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/tree/source/controllers/treeCtrl.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/tree/source/directives/uiTree.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/tree/source/directives/uiTreeHandle.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/tree/source/directives/uiTreeNode.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/tree/source/directives/uiTreeNodes.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/tree/source/services/helper.js') }}"></script>

<script src="{{ URL::asset('js/angular/ui/view/main.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/view/source/controllers/ViewController.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/view/source/controllers/handleCtrl.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/view/source/directives/uiView.js') }}"></script>

<script src="{{ URL::asset('js/angular/ui/form/directives/form-directive.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/form/directives/field-directive.js') }}"></script>

<script src="{{ URL::asset('js/angular/ui/tree/examples/js/app.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/tree/examples/js/basic-example.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/tree/examples/js/filter-nodes.js') }}"></script>
<script src="{{ URL::asset('js/angular/ui/tree/examples/js/connected-trees.js') }}"></script>

<script src="https://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
</body>
</html>