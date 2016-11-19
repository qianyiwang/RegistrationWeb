<?php
$umid = $_GET["umid"];
$fname = $_GET["fname"];
$lname = $_GET["lname"];
$projtitle = $_GET["projtitle"];
$email = $_GET["email"];
$phone = $_GET["phone"];
$select = $_GET["select"];

// initial db, select table
$mysql_server_name="198.71.225.61"; 
$mysql_username="qianyiw"; 
$mysql_password="123456789"; 
$mysql_database="RegisterDB"; 
$con=mysql_connect($mysql_server_name, $mysql_username,
                                $mysql_password);

mysql_select_db("RegisterDB",$con);
$result = mysql_query("SELECT * FROM TimeSlotInfo");
$idx = 0;
while ($row = mysql_fetch_array($result))
{
	if($idx == $select){
		$studentIdx = $row["studentnum"]+1;
		if($row["studentnum"]==0){
			$totalFirstName = $row["fname"] . $fname;
			$totalLastName = $row["lname"] . $lname;
			$totalUmid = $row["umid"] . $umid;
			$totalEmail = $row["email"] . $email;
			$totalPhone = $row["phone"] . $phone;
		}
		else{
			$totalFirstName = $row["fname"] . "," . $fname;
			$totalLastName = $row["lname"] . "," . $lname;
			$totalUmid = $row["umid"] . "," . $umid;
			$totalEmail = $row["email"] . "," . $email;
			$totalPhone = $row["phone"] . "," .$phone;
		}
	}  
	$idx++;
}

echo $studentIdx . $totalFirstName . $totalLastName . $totalUmid . $totalEmail . $totalPhone;

?>

<<html>
<head>
	<title>Register Result</title>
</head>

<body>
	<header>
		<h1>Student information in your time slot</h1>
	</header>
		
	<main>
		<h2>Student's name: <?php echo $lname . $fname; ?>, student's email: <?php echo $email ?></h2>
		
	</main>
	<footer>
    	<p>&#169 2016 Qianyi Wang</p>
    </footer>
</body>
</html>




