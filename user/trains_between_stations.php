 <!DOCTYPE HTML> 
<html>
<head>
<style>
      table,th,tr,td{
        border:1px solid;
        padding:10px;
        border-collapse:collapse;
      }
      th{
        background-color:#abdec2;
      }
      tr{
        background-color:#decab1;
      }
      td{
        text-align:center;
      }
    </style>
<link rel="Stylesheet" type="text/css" href="../css/login.css">
</head>
<body class="mainheader">
<br />
<br />
<h1>Railway Reservation System</h1>
<br />
<br />
<br />
<img src="../images/rail1.png">
<br />
<br />
<br />
<br />
<br />


<?php 

 require '../dbconnect.php';

if(isset($_POST['submit']))
{

    $Source_stn=mysql_escape_string($_POST['Source_stn']);
    $Destination_stn=mysql_escape_string($_POST['Destination_stn']);
    
    $sql=mysqli_query($con,"SELECT * FROM `train` WHERE `Source_stn`='$Source_stn' AND `Destination_stn`='$Destination_stn'");
    echo "<table border='1'>
<tr>
<th>Train_ID</th>
<th>Train_name</th>
<th>Train_type</th>
<th>Source_stn</th>
<th>Destination_stn</th>
</tr>";

while($row = mysqli_fetch_array($sql)) {
  echo "<tr>";
  echo "<td>" . $row['Train_ID'] . "</td>";
  echo "<td>" . $row['Train_name'] . "</td>";
  echo "<td>" . $row['Train_type'] . "</td>";
  echo "<td>" . $row['Source_stn'] . "</td>";
  echo "<td>" . $row['Destination_stn'] . "</td>";
  echo "</tr>";
}

echo "</table>";
 }
 else{

$form = <<<EOT
<form action="trains_between_stations.php" method="POST">

<b>Source_stn:<input type="text" name="Source_stn" /></b><br /><br />
<b>Destination_stn:<input type="text" name="Destination_stn" /></b><br /><br />
<a><input type="submit" value="submit" name="submit" /></a>
</form>
EOT;

echo $form;
 

}
 
?> 
</body>
</html>