<?php

$mysql_server_name="198.71.225.61"; 
$mysql_username="qianyiw"; 
$mysql_password="123456789"; 
$mysql_database="RegisterDB"; 
$con=mysql_connect($mysql_server_name, $mysql_username,
                                $mysql_password);

mysql_select_db("RegisterDB",$con);
$result = mysql_query("SELECT * FROM TimeSlotInfo");

$j=0;
while ($row = mysql_fetch_array($result))
{
    $studentnum[$j] = $row["studentnum"];
    $j++;
    
}
$data=array("studentnum"=>$studentnum);
mysql_close($con);
echo json_encode($data);
?>