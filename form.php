<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Page</title>
</head>
<body>
	<div class="container">
		<div class="main">
			<?php if(isset($_SESSION['error'])):?>
			<div class="form">
				<?php echo $_SESSION['error']; unset($_SESSION['error']);?>
			</div>
			<?php endif;?>
			<form action="/auth.php" method="post">
				<div class="form_group">
					<label for="">Email</label>
					<input type="email" class="form_control" name="email">
				</div>
				<div class="form_group">
					<label for="">Pass</label>
					<input type="password" class="form_control" name="password">
				</div>
				<button type="submit" class="btn">Enter</button>
			</form>
		</div>
	</div>	
</body>
</html>