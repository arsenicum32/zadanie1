<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Image upload</title>
	<script src="jquery.js"></script>
	<script>
		$(document).ready(function () {
		});
	</script>
</head>
<body>
	<?php
	include 'base.php';
	echo $data;//["bilain"][903]["altaiskii_krai"][0]=="0720000..0739999";
	?>
	<form action='upload.php' method='post' enctype='multipart/form-data'>
		<input type='file' name='userfile'></input>
		<input type='submit' class='submit'/>
	</form>
</body>
</html>
