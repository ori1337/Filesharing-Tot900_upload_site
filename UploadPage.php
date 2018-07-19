<?php
$target_dir = "uploads/";
$target_file1 = $target_dir . basename($_FILES["fileToUpload"]["name"]);

//PATHINFO_EXTENSION
$imageFileType = pathinfo($target_file1,PATHINFO_EXTENSION);

header('Content-Type: text/html; charset=windows-1255'); 
//Random string (for the filename) //changing names to avoid exploits..
function generateRandomString($length = 10) {
    $characters = 'qwertyuiopasdfghjklzxcvbnm1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


//rename the filename to crap
$NewName = generateRandomString();
move_uploaded_file($target_file1, basename($NewName). basename($imageFileType));
$target_file = $target_dir . basename($NewName).".".basename ($imageFileType );


$uploadOk = 1;

// Check if image file is a actual image or fake image
/*
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}

*/
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1572864000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"//JPG PNG FPEG GIF
&& $imageFileType != "gif" && $imageFileType != "mp4" && $imageFileType != "rar" && $imageFileType != "zip") {
    echo "Sorry, only JPG, JPEG, PNG, MP4, RAR, ZIP & GIF files are allowed.";
    $uploadOk = 0;
	echo "\nY0U REDIRECT TO INDEX IS 5 SEC";
	echo "<meta http-equiv=\"refresh\" content=\"5;url=\"/>";
	
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded."; 
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<br><br><br><br><br><br><br><br>";
		echo "
		<center>
		<div style=\"font-size:300%\">The file ". basename ( $_FILES["fileToUpload"]["name"]. "has been uploaded, as". $target_file  ). " has been uploaded.</div>
		</center>
		";
		//basename($_FILES["fileToUpload"]["name"]. "has been uploaded, as". 
		
		if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType || "jpeg" && $imageFileType || "gif") {
			echo "<br><br><br><br><br><br><br><br>";
			echo "<center><meta http-equiv=\"refresh\" content=\"2;url=/?img=". basename( $target_file  ). "\"/></center>";
		}
		if($imageFileType == "mp4"){
			echo "<center><meta http-equiv=\"refresh\" content=\"2;url=/?video=". basename( $target_file). "\"/></center>";
		}
		if($imageFileType == "rar" || $imageFileType == "zip"){
			echo "<center><meta http-equiv=\"refresh\" content=\"2;url=/?rarOrZip=". basename( $target_file)."\"/></center>";
		}
    } else {
        echo "Sorry, there was an error uploading your file.";
		echo "<meta http-equiv=\"refresh\" content=\"5;url=\"/>";
    }
}
?>
