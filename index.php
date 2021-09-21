<!DOCTYPE html>
<html>
<body>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Json data</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
@import url('https://fonts.googleapis.com/css?family=Titillium+Web');

*{
    font-family: 'Titillium Web', sans-serif;
}
form{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
form{
   
text-align: center;
 color: #66afe9;
 background-color: #efefef;
padding: 2%;
font-weight: bold;
}
       
        input{
            background-color: #efefef;
            font-weight: bold;
        }
 
</style>
<form action="" method="post" enctype="multipart/form-data">
  Select file to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="submit">
</form>
</body>

<?php
include "connection.php";
if(isset($_POST["submit"]))
{
    $target_dir = 'uploads/';
    $file = $_FILES['fileToUpload']['name'];
    $target_file = $target_dir . $file;
    $uploadOk = 1;
    $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
   
      if($FileType != "json" ) {
      echo "Sorry, only Json files are allowed.";
      $uploadOk = 0;
    }    
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
     
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
          
            $data = file_get_contents('data.json');
        
            $array = json_decode($data, true );
        
            foreach( $array as $row){
                $sql = "INSERT INTO `jsondata` VALUES ('".$row["userId"]."','".$row["id"]."','".$row["title"]."','".$row["body"]."')";
                mysqli_query($conn, $sql);
            }
            echo "data inserted";
             ?><a href="main.php" style="color:black;font-weight: bold;">Click here to view the contents of the json file.</a>;
            <?php
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
      
}



?>



</html>