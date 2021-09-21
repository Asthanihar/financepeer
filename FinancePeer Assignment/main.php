<?php
  session_start();
  require "connection.php";
 
?>

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
.product{
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
table, th, tr{
    text-align: center;
    }
.title2{
text-align: center;
 color: #66afe9;
 background-color: #efefef;
padding: 2%;
}
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
 .button2{
    border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  background-color:#008CBA;
  position:relative;
  margin: 0;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
</style>
      <body>
    <div style="clear: both"></div>
      <h3 class="title2"> Json data</h3>
      <div class="table-responsive">
      <table id="data" class="table">
      <tr>
                <th width="20%">userid</th>
                <th width="20%">id</th>
                <th width="30%">title</th>
                <th width="30%">body</th>
            </tr>
            <?php

            $query1=" SELECT * FROM `jsondata`";
            if($r=mysqli_query($conn,$query1))
            {
                while($row=  mysqli_fetch_assoc($r))
                {
                 ?>
                <tr>
                <td><?php echo $row['userId']; ?></td>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['body'] ;?></td>
            </tr>
            <?php
             }
            }
             ?>
            
            </table>
        </div>

    </div><br><br><br><br>
    <button class="button2" onclick=location.href="logout.php"> Logout</button><br><br>
    
    </body>
    </html>