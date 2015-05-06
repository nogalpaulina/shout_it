<?php include "database.php"; ?>
<?php
	// Create select query
	$query = "SELECT * FROM shouts ORDER BY id DESC";  // select all shouts
	$shouts = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>SHOUT IT!</title>
	<link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<div id="container">
		<header>
			<h1>SHOUT IT! Shoutbox</h1>
		</header>
		<div id="shouts">
			<ul>
				<?php  while($row = mysqli_fetch_assoc($shouts)) : ?>
					<li class="shout"><span><?php echo $row['Time']; ?> - </span><strong><?php echo $row['User']; ?> : </strong><?php echo $row['Message']; ?></li>
				<?php endwhile; ?>
			</ul>
		</div>
		<div id="input">
			<?php if (isset($GET_['error]'])): ?>
				<div class="error"><?php echo $_GET['error']; ?></div>
			<?php endif; ?>
			<form method="post" action="process.php">
				<input type="text" name="user" placeholder="Enter your name" />
				<input type="text" name="message" placeholder="Enter your message" />
				<br />
				<input class="shout-btn" type="submit" name="submit" value="Shout it out" />
			</form>
		</div>
	</div>
</body>
</html>