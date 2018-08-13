var app = angular.module("ResumeApp",[]);
app.controller("resumeController",function($scope,$http){


	
	
	
	$scope.submitData = function()
	{
		
				$scope.name = document.getElementById("name").value;
				$scope.email = document.getElementById("email").value;
				$scope.mobile = document.getElementById("mobile").value;
				$scope.message = document.getElementById("message").value;
				if($scope.name=="" || $scope.email=="" || $scope.mobile=="" || $scope.message=="" || $scope.datavalue1 == 1 || $scope.datavalue2 == 1)
				{
						alert("Give Valid Details");
						$scope.send = false;
			
				}
				else
				{
						$http.post('contact.php',{'name':$scope.name,'email':$scope.email,'mobile':$scope.mobile,'message':$scope.message})
						.success(function (data, status, headers, config)
						{
							$scope.datavalue = data;
							if($scope.datavalue == 1)
							{
								$scope.send = true;
								$('#contactForm').trigger("reset");
							}
			
						})
		
						.error(function (data, status, headers, config)
						{
			
						});		
				}
				
		
				
	}
		
	$scope.checkEmail = function()
	{
		$scope.email = document.getElementById("email").value;
		$http.post('checkemail.php',{'email':$scope.email})
		.success(function (data, status, headers, config)
		{
			$scope.datavalue1 = data;
			if($scope.datavalue1 == 1)
			{
				$scope.checkemail_id = true;
				
				
			}
			else
			{
				$scope.checkemail_id = false;
				

			}
		})
		
		.error(function (data, status, headers, config)
		{
			
		});	
		
	}
	$scope.checkMobile = function()
	{
		$scope.mobile = document.getElementById("mobile").value;
		$http.post('checkmobile.php',{'mobile':$scope.mobile})
		.success(function (data, status, headers, config)
		{
			$scope.datavalue2 = data;
			if($scope.datavalue2 == 1)
			{
				$scope.checkmobile_no = true;
				
				
			}
			else
			{
				$scope.checkmobile_no = false;
				
			}
		})
		
		.error(function (data, status, headers, config)
		{
			
		});	
	}

});