<!DOCTYPE>

<?php
	include("functions/functions.php");
?>

<html>
	<head>
		<title>
			Test Shop
		</title>
		<link rel="stylesheet" type="text/css" href="./styles/style.css" media="all"/>
	</head>
	<body>
		<div class="main" style="background-color: rgba(244, 244, 244, 0.982)">
			<div class="logo">
			</div>	
			<div class="header">
			</div>
			<div id="search_form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search"/>
					<input type="submit" name="search" value="Search" />
				</form>
			</div>
			<div class="navbar">
				<div class="menu">
					<div class="menu_link"><a href="index.php">Home</a></div>
					<!--<div class="menu_link"><a href="#">Products</a></div>-->
					<div class="menu_link"><a href="">My Account</a></div>
					<div class="menu_link"><a href="#">Sign-Up</a></div>
					<div class="menu_link"><a href="cart.php">Cart</a></div>
					<div class="menu_link"><a href="#">Contact</a></div>
				</div>
			</div>
			<div class="sidebar">
				<div class="sidebar_heading">
					Brands
				</div>
				<div class="Brands">
					<?php getBrands(); ?>
				</div>
				<div class="sidebar_heading">
					Categories
				</div>
				<div class="Categories">
					<?php getCategories(); ?>
				</div>
			</div>
			<div class="main_container">
				<?php
					cart();
				?>
				<div id="shopping_cart">
					<div>Welcome Guest</div>
					<div>Total Items: <?php getTotalCartItems(); ?></div>
					<div>Total Price: <?php getTotalCartPrice(); ?></div>
					<div><a href="cart.php">Go To Cart</a></div>
				</div>
				<?php getIP(); ?>

				<div class="product_container">
					<?php getProducts(); ?>
					<?php getProductsByCategory(); ?>
					<?php getProductsByBrand(); ?>
				</div>

			</div>
			<div class="footer">
			</div>
		</div>
	</body>
</html>
