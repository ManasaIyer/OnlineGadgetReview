<?php
	session_start();
		require'config.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gadget Review</title>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/profile2.css">
  </head>
	<style>
	.posts{
	      background-color: white;
	      padding: 10px;
	      width: 100%;
	      border-bottom: 1px solid #b7b7a4;
	  }
		.navbar-text{
		    font-size: 30px;
				font-weight: bold;
		}
	</style>
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

    <div class="row">
      <div class="profile">
        <center>
        <?php echo '<img class="profileimg" src="img/'.$_SESSION['image'].'" alt="">'?><br><br>
				<?php echo '<p style="font-style: italic;">'.$_SESSION['name'].'</p>'?>
				<?php echo '<p >'.$_SESSION['email'].'</p>'?>
				<?php echo '<p >'.$_SESSION['phone'].'</p>'?>
        <button type="button" name="button" class="btn bttn" id="myBtn">Edit</button>
        </center>
      </div>
			<?php
			$v = $_SESSION['email'];
			$sql = "select * from review where user_id ='$v'";
			$result = mysqli_query($con,$sql);
			$row = mysqli_num_rows($result);
			if($row)
			{?>
			<div class="profile2">
		        <div class="heading">
		          <span class="title">Posts</span>
		          <span class="right1"><?php echo $row;?> posts</span>
		        </div>
		          <div class="table-wrapper-scroll-y my-custom-scrollbar">
		          <table>
								<?php for ($i=0; $i <$row ; $i++) {
									$array = mysqli_fetch_row($result);?>
		             <tr>
		               <td class="posts">
		                 <span class="navbar-text"><?php echo $array[0]; ?></span>
		                 <div class="description">
		                   <p><?php echo $array[2]; ?></p>
		                 </div>
		                   <div class="picture">
		                     <?php if(empty($array[3]))
					 							{
					 								continue;
					 							}
					 							else
					 							 echo '<img class="profileimg" src="img/'.$array[3].'" alt="">'?>
		                   </div>
		               </td>
		             </tr>
							 <?php } }?>

						</table>
							 </div>
						 </div>

    <div id="myModal2" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <span class="close2">&times;</span>
        <h2>EDIT</h2>
        <form action="edit.php" method="post">
          <div class="row">
            <div class="col1">
              <?php echo '<img class="editimg" src="img/'.$_SESSION['image'].'" alt="">'?><br>
              <input type="file" name="image" id="file" value="" accept="image/*" placeholder="editimg">
            </div>
            <div class="col1">
							<?php echo '<h2> '.$_SESSION['email'].'</h2>'?><br>
							<?php echo '<input type="text" name="username"  class="inp" placeholder="'.$_SESSION['name'].'" value="">'?><br>
              <?php echo '<input type="number" pattern="[0-9]{10}"  name="number"  class="inp" placeholder="'.$_SESSION['phone'].'">'?><br>
							<?php echo '<input type="password"  name="password" placeholder="password" class="inp" >'?><br>
            </div>
          </div>
          <button type="submit" name="edit" class="btn bttn">Submit</button>
        </form>
      </div>
    </div>
		<script type="text/javascript">
		function Category(value,value1) {
			document.cookie = "product = " + value;
			if(value1 == 'ancy@gmail.com')
			{
				location.href = 'ahome.php';
			}
			location.href = 'home.php';
		}
		function myFunction(value) {
			document.cookie = "val = " + value;
			location.href = 'product.php';
		}
		</script>
    <script type="text/javascript">
    var modal2 = document.getElementById("myModal2");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span2 = document.getElementsByClassName("close2")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
    modal2.style.display = "block";
    }

    span2.onclick = function() {
    modal2.style.display = "none";
    document.getElementById("email1").value = "";
    document.getElementById("pass1").value = "";
    }

    window.onclick = function(event) {
    if (event.target == modal2) {
      modal2.style.display = "none";
      document.getElementById("email1").value = "";
      document.getElementById("pass1").value = "";
    }
    }
    </script>

  </body>
</html>
