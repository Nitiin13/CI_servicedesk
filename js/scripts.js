var app=angular.module('myApp',[]);
// var compareTo = function () {
//     return {
//         require: "ngModel",
//         scope: {
//             otherModelValue: "=compareTo"
//         },
//         link: function (scope, element, attributes, ngModel) {
//             ngModel.$validators.compareTo = function (modelValue) {
//                 return modelValue == scope.otherModelValue;
//             };

//             scope.$watch("otherModelValue", function () {
//                 ngModel.$validate();
//             });
//         }
//     };
// };

// app.directive("compareTo", compareTo);

app.controller('myController',function($scope,$http){
    $scope.email='';
    $scope.password='';
    console.log('called');
    $scope.error=false;
    $scope.authenticate=function(){
            if($scope.email==undefined && $scope.email=='' || $scope.pass==undefined && $scope.pass=='')
            {
            $scope.error=true;
            // return false;
        }
            else{
                console.log('success');
                $scope.info={
                    email:$scope.email,
                    pass:$scope.pass};
                $http({
                    method:'POST',
                    url:'service/authenticate',
                    headers:{'Content-Type':'application/www-form-urlencoded'},
                    data:$scope.info
                }).then(function(response){  
                 var role=response.data;
                console.log(role);
                if(role=='admin')
                        {
                        location.replace("service/admin_portal");
                        }
                        else{
                            location.replace("service/ticket_portal");
                        }
                    
                },function(response){
                    $scope.message="failed";
                });
            }
        }
    }).controller('ticketController',function($scope,$http){
        $scope.tickettitle="";
        $scope.ticketdetail="";
       $scope.present=false;
       $scope.errormessage=false;
        
        $scope.tickets=function()
        {
            console.log('clicked');
        $http({
            method:'GET',
            url:'service/usertickets',
            headers:{'Content-Type':'application/json'},
            // // data:$scope.data}

        }).then(function(response){
            if(response.data){
            $scope.present='true';
            console.log(response.data);
           $scope.tickets=response.data;
            }
        },function(response){
            $scope.Message="failed";
        })
    }
    $scope.ticketadd=function(){
        
        if($scope.tickettitle=="" || $scope.tickettitle==""){
            $scope.errormessage=true;
            return false;
           
        }
        else{
     data={
        title:$scope.tickettitle,
        desc:$scope.ticketdetail
     }

        $http({
            method:'POST',
            url:'service/ticket_add',
            headers:{'Content-Type':'application/json'},
            data:data
        }).then(function(response){
            if(response.data==1)
            {
                console.log('inserted');
            }
        },function(response){
            
        })
    }
}
    }).controller('adminController',function($scope,$http){
        
        $scope.alltickets=function()
        {
        $http({
            method:'GET',
            url:'service/admin_view_tickets',
            headers:{'Content-Type':'application/json'}
        }).then(function(response){
            if(response.data){
            console.log(response.data);
           $scope.alltickets=response.data;
            }
        },function(response){
            $scope.Message="failed";
        })
    }}).controller("registerController",function($scope,$http)
    {
        $scope.name="";
        $scope.email="";
        $scope.pass="";
        $scope.cpass="";
        $scope.error=false;
        $scope.registerUser=function(){
        if($scope.pass==$scope.cpass){
           data={ uname:$scope.name,
            email:$scope.email,
            pass:$scope.pass}
            $http({
                method:'POST',
                url:'service/registerUser',
                headers:{'Content-Type':'application/json'},
                data:data
            }).then(function(response){
                if(response.data)
                {
                   window.location.replace('service/register');
                }
            },function(response){
                $scope.message="something went wrong!"
            }
    )}
        else{
            $scope.error=true;
        }
    }
    }).controller("headController",function($scope,$http){
        $scope.logout=function(){
            $http({
                method:'POST',
                url:'service/logout',
                headers:{'Content-Type':'application/json'}
            }).then(function(response){
                window.location.replace('service/');
            })
        }
        $scope.register=function(){
            $http({    
            method:'POST',
            url:'service/register',
            headers:{'Content-Type':'application/json'},
        }).then(function(response){
            window.location.replace('service/register');
        },function(response){

        })
        }
    });
    