<?php
	session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gadget Review</title>
    <link rel="stylesheet" href="css/nav.css">
		  <link rel="stylesheet" href="css/home.css">
</head>
<body>

	<nav role="navigation">
		<ul>
			<li class="m" style="font-size: 28px;font-style: italic;font-weight: bold;">Gadget Review</li>
			<li class="right">
				<div class="dropdown">
					<?php echo '<img class="profilepic" src="img/'.$_SESSION['image'].'" alt="">'?>
					<div class="dropdown-content">
						<button type="button" class="drop"  onclick="window.location.href='profile.php';" name="button"><?php echo $_SESSION['email']?></button>
						<button type="button" class="drop"  onclick="window.location.href='logout.php';" name="button">log out</button>
					</div>
				</div></li>
			<li class="right m"><a href="profile.php">Profile</a></li>

			<li class="right m">
				<?php if($_SESSION['email'] == 'ancy@gmail.com')
				{ ?>
				<a href="ahome.php">Home</a></li>
			<?php }  else { ?>
						<a href="home.php">Home</a></li>
			 <?php	} ?>
			 <li class="right m">
				 <form class="" action="search.php" method="post">
							 <input type="text" name="search" value="" placeholder="search" class="search">
							 <button type="submit" name="searchbutton" class="searchbtn">&#128269;</button>
					 </form>
			</li>
		</ul>
	</nav>
<center>
<img style="margin-top: 90px;"src="img/empty.gif" alt="">
</body>
