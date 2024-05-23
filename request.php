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
$bn=$_POST['name'];
$ba=$_POST['author'];
if($bn!=NULL && $ba!=NULL)
{
	$sql=mysqli_query($set,"INSERT INTO request(name,author,sid) VALUES('$bn','$ba','$sid')");
	if($sql)
	{
		$msg="Successfully Requested";
	}
	else
	{
		$msg="Request Already Exists";
	}
}
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

<span class="SubHead">Request for Unavailable Book</span>
<br />
<br />
<form method="post" action="">
<table border="0" class="table" cellpadding="10" cellspacing="10">
<tr><td class="msg" align="center" colspan="2"><?php echo $msg;?></td></tr> 
<tr><td class="labels">Book : </td><td><input type="text" size="25" class="fields" required="required" name="name" placeholder="Enter Book Name" /></td></tr>
<tr><td class="labels">Author Name : </td><td><input type="text" size="25" class="fields" required="required" name="author" placeholder="Enter Author Name" /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" class="fields" value="Request" /></td></tr>
</table>
</form>

<br />
<br />
<a href="home.php" class="link">Go Back</a>
<br />
<br />

</div>
</div>
</body>
</html>