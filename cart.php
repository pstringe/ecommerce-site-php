<!DOCTYPE>

<?php
	include("functions/functions.php");
?>

<html>
	<head>
		<title>
			Test Shop
		</title>
		<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
	<body>
		<div class="main">
			<div class="header">
			</div>
			<div class="navbar">
				<div class="menu">
					<div class="menu_link"><a href="index.php">Home</a></div>
					<!--<div class="menu_link"><a href="#">Products</a></div>-->
					<div class="menu_link"><a href="#">My Account</a></div>
					<div class="menu_link"><a href="#">Sign-Up</a></div>
					<div class="menu_link"><a href="cart.php">Cart</a></div>
					<div class="menu_link"><a href="#">Contact</a></div>
				</div>
				<!--
				<div id="search_form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search"/>
						<input type="submit" name="search" value="Search" />
					</form>
				</div>
				-->
			</div>
			<div class="sidebar">
				<div class="sidebar_heading">
					Brands
				</div>
				<div id="Brands">
					<?php getBrands(); ?>
				</div>
				<div class="sidebar_heading">
					Categories
				</div>
				<div id="Categories">
					
					<?php getCategories(); ?>
				</div>
			</div>
			<div class="main content">
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

				<div id="product container">
					<form action="" method="post" enctype="multipart/form-data">
						<div id="cart-heading">
							<h2>Update Cart or Checkout</h2>
						</div>
						<div id="main-cart-area">
						<?php
							getCartProducts();
						?>	
						</div>
						<input type="submit" name="update_cart" value="Update Cart" />
						<input type="submit" name="continue" value="Continue Shopping" />
						<button><a href="checkout.php">Checkout</a></button>
						
					</form>	
					<?php
						updateCart();
					?>
				</div>

			</div>
			<div class="footer">
			</div>
		</div>
	</body>
</html>
