<?php
   
    error_reporting(E_ALL);
	$filename = "Shikha_resume.pdf";
	print_r($filename);
  
    if(!empty($filename)){
   
    $path = "..//resume_shikha/resumeshikha/";
    $download_file =  $path.$filename;
	echo $download_file ;
    
    if(file_exists($download_file))
    {
      
      $extension = explode('.',$filename);
      $extension = $extension[count($extension)-1]; 
	  header('Content-Transfer-Encoding: binary');  
      header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');
      header('Accept-Ranges: bytes');  
	  header('Content-Length: ' . filesize($download_file));  
      header('Content-Encoding: none');
      header('Content-Type: application/' . $extension);  
      header('Content-Disposition: attachment; filename=' . $filename); 
      ob_clean();
      flush();	  
      readfile($download_file); 
      exit;
    }
    else
    {
      echo 'File does not exists on given path';
    }
 
 }
    
?>

