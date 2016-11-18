<?php
$umid = $_GET["umid"];
$fname = $_GET["fname"];
$lname = $_GET["lname"];
$projtitle = $_GET["projtitle"];
$email = $_GET["email"];
$phone = $_GET["phone"];

echo "Welcome" . $lname . ". Your project title is: " . $projtitle;
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




