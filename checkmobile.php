<?php
	$post_data = file_get_contents("php://input");
	$data = json_decode($post_data);
	$mobile_no= $data->mobile;
	if(isset($mobile_no))
	{
		include "db/db_connection.php"; 
	    date_default_timezone_set('Asia/Calcutta');
		
		$result = $dbConnection->prepare("SELECT mobile_no FROM contact where mobile_no=?");
		$result->execute(array($mobile_no));
		$num1 = $result->rowCount();
		if($num1>0) 
		{
			$response = 1;
		} 
		else
		{
			$response = 0;
		}
	}
	else
	{
		$response = 0;
	}
    echo json_encode($response);
?>