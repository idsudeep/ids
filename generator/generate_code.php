<?php 
error_reporting(E_ALL);

// Set the current working directory 
$directory = getcwd()."/folder/"; 

$disk_space = disk_total_space($directory);
$disk_free_space = disk_free_space($directory);



function calculateFileSize($size)
{
   $sizes = ['B', 'KB', 'MB', 'GB'];
   $count=0;
   if ($size < 1024) {
    return $size . " " . $sizes[$count];
    } else{
     while ($size>1024){
        $size=round($size/1024,2);
        $count++;
    }
     return $size . " " . $sizes[$count];
   }
}

$total_space= calculateFileSize($disk_space);
$disk_free_space= calculateFileSize($disk_free_space);



$filecount = 0; 
  
$files2 = glob( $directory ."*" ); 
  
if( $files2 ) { 
    $filecount = count($files2); 
} 
  
/*
echo $filecount . "files "; 
*/
  


if(isset($_POST) && !empty($_POST)) {
	include('library/phpqrcode/qrlib.php'); 

	/*$codeFile = date('d-m-Y-h-i-s').'.png';*/
	$codeContents = $_POST['formData'];
	
    
    $fileName = '005_file_'.($codeContents).'.png'; 
    
    
    $pngAbsoluteFilePath = 'folder/'. DIRECTORY_SEPARATOR .$fileName; 
    
    
     if (!file_exists($pngAbsoluteFilePath)) {
          /*  QRcode::png($codeContents, $pngAbsoluteFilePath); 
         */
         QRcode::png($codeContents, $pngAbsoluteFilePath, $_POST['ecc'], $_POST['size']); 
            echo "<h5 style='color:blue; font-family:mono space;'>Generating...</h5>"; 
            echo '<hr />'; 
        } else { 
            echo "<h5 style='color:Green'>Scan.</h5>"; 
            echo '<hr />'; 
        } 
    
    // generating QR code
	
	 // display generated QR code
	echo '<img class="img-thumbnail" src="'.$pngAbsoluteFilePath.'" />';
} else {
	/*header('location:./qrcode_gen.php');*/
}
?>