<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate/animate.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0-beta.2/angular.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
  </head>
  <body ng-app="myApp" ng-controller="myCtrl">
      <div class="jumbotron">
        <div class="container">
           <h1>Hello, world!</h1>
                 <p>Crud Test</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
        </div>
      </div>
      <div class="container">
        <h2>Test Crud</h2>
       
         <?php
            if ( !empty($_POST)) {
                
                print_r("<script>alert(\"$_POST\")</script>"); 
            }
            $servername = "localhost";
            $username = "root";
            $password = "";
            $bd = "crud";

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $bd);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $query = "SELECT name FROM names";
            
            if ($result = $conn->query($query)) {

                while ($row = $result->fetch_assoc()) {

                    $name = $row["name"];
                    echo $name;
                    

                 }
            }
        ?>
        <table class="table table-bordered">
          <tbody>
              <br/><br/>
            <tr>
              
              <td>
                  <div class="form-group">
                    <input type="text" class="form-control" id="usr" ng-model="name">
                 </div>
              </td>
             <td>
                  <div class="form-group">
                <input type="text" class="form-control" id="usr">
                 </div>
              </td>
             <td>
                  <div class="form-group">
                <input type="text" class="form-control" id="usr">
                 </div>
              </td>
              <td></td>
              <td><button type="button" class="btn btn-success center-block" ng-click="addRow()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></td>
            </tr>
            <tr>
          </tbody>
        </table>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            <tr class="animated infinite bounceIn" ng-repeat="rowContent in rows">
              <td>{{rowContent}}</td>
              <td>Doe</td>
              <td>john@example.com</td>
              <td><button type="button" class="btn btn-danger center-block" ng-click="removeRow()"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
            </tr>
           
          </tbody>
        </table>
      </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        var app = angular.module('myApp', []);
        app.controller('myCtrl', function($scope, $http) {
            //$scope.firstName = "John";
            $scope.rows = ['Row 1', 'Row 2'];
            $scope.counter = 3;
            $http({
                method: 'POST',
                url: '/index.php'
              }).then(function successCallback(response) {
                  $scope.firstName = $scope.firstName;
                  $scope.addRow = function(){
                    //angular.element('#upload').trigger('click');
                    //$scope.firstName = $val;
                    //console.log("test");
                    $scope.rows.push('Row ' + $scope.counter);
                    $scope.counter++;
                  }
                  $scope.removeRow = function(){
                   
                    console.log('remove');
                   
                  }
                }, function errorCallback(response) {
                  $scope.firstName = "Nop";
                });
            
        });
    </script>
  </body>
</html>