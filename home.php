<?php
include("setting.php");
session_start();
if(!isset($_SESSION['sid']))
{
	header("location:index.php");
}
$sid=$_SESSION['sid'];
$a=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid'");
$b=mysqli_fetch_array($a);
$name=$b['name'];
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Management System</title>
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="banner">
<span class="head">Library Management System</span><br />
<marquee class="clg" direction="right" behavior="alternate" scrollamount="1">Library Management System</marquee>
</div>
<br />

<div align="center">
<div id="wrapper">
<br />
<br />

<span class="SubHead">Welcome <?php echo $name;?></span>
<br />
<br />
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td><a href="issueBook.php" class="Command">Issue Book</a></td><td><a href="request.php" class="Command">Request New Books</a></td></tr>
<tr><td><a href="changePassword.php" class="Command">Change Password</a></td><td><a href="logout.php" class="Command">Logout</a></td></tr>
</table>
<br />
<br />

<br />
<br />

</div>
</div>
</body>
</html>