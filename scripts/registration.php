<?php
$umid = $_GET["umid"];
$fname = $_GET["fname"];
$lname = $_GET["lname"];
$projtitle = $_GET["projtitle"];
$email = $_GET["email"];
$phone = $_GET["phone"];
$select = $_GET["select"]+1;

// initial db, select table
$mysql_server_name="198.71.225.61"; 
$mysql_username="qianyiw"; 
$mysql_password="123456789"; 
$mysql_database="RegisterDB"; 
$con=mysql_connect($mysql_server_name, $mysql_username,
                                $mysql_password);

mysql_select_db("RegisterDB",$con);

// insert into row
fetchRowAndUpdate($select);
// else{
// 	echo "<script type='text/javascript'> 
// 	answer = confirm('You have already registered, do you want to update?'); 
// 	</script>";
// 	// fetchRowAndUpdate($select);
// }

mysql_close($con);

function removePrev(){

}

function fetchRowAndUpdate($select){
	$result = mysql_query("SELECT * FROM TimeSlot");
	echo $select;
	while($row = mysql_fetch_array( $result))
	{
		if($row['id'] == $select)
		{
	    	$studentnum = $row['studentnum'];

			if($row["studentnum"]==0){
				$studentnum++;
				$totalFirstName = $row["fname"] . $GLOBALS['fname'];
				$totalLastName = $row["lname"] . $GLOBALS['lname'];
				$totalUmid = $row["umid"] . $GLOBALS['umid'];
				$totalEmail = $row["email"] . $GLOBALS['email'];
				$totalPhone = $row["phone"] . $GLOBALS['phone'];
				$totalProj = $row["project name"] . $GLOBALS['projtitle'];

			}
			else{
				$studentnum++;
				$totalFirstName = $row["fname"] . "," . $GLOBALS['fname'];
				$totalLastName = $row["lname"] . "," . $GLOBALS['lname'];
				$totalUmid = $row["umid"] . "," . $GLOBALS['umid'];
				$totalEmail = $row["email"] . "," . $GLOBALS['email'];
				$totalPhone = $row["phone"] . "," .$GLOBALS['phone'];
				$totalProj = $row["project name"] . "," . $GLOBALS['projtitle'];
			}
		    break;
		}
	}

	mysql_query("UPDATE `TimeSlot` SET `studentnum` = '$studentnum', `umid` = '$totalUmid', `fname` = '$totalFirstName', 
	`lname` = '$totalLastName', `project name` = '$totalProj', `email` = '$totalEmail', `phone` = '$totalPhone' 
	WHERE id = '$select' ");
}


?>

<<html>
<head>
	<title>Register Result</title>
</head>

<body>
	<header>
		<h1><?php echo $fname ?>, please view your registration information.</h1>
	</header>
		
	<main>
		<h2><?php echo $fname ?>'s information: </h2>
		

		<h2>These students are also in your time slot: </h2>
		
	</main>
	<footer>
    	<p>&#169 2016 Qianyi Wang</p>
    </footer>
</body>
</html>




