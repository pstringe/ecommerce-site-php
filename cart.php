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
			<div class="logo">
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
			<div class="main_container">
				<?php
					cart();
				?>
				<div class="shopping_cart">
					<div class="cart_type style="padding-right: 150px;"">Welcome Guest</div>
					<div class="cart_type">Total Items: <?php getTotalCartItems(); ?></div>
					<div class="cart_type">Total Price: <?php getTotalCartPrice(); ?></div>
					<div class="cart_type"><a href="cart.php">Go To Cart</a></div>
				</div>

				<?php getIP(); ?>

				<div id="product_container">
					<form action="" method="post" enctype="multipart/form-data">
						<div id="cart-heading">
							<h2>Update Cart or Checkout</h2>
						</div>
						<div id="main-cart-area">
							<?php
								getCartProducts();
							?>	
						</div>
						<div class="cart_buttons" style="background-color: lightblue;">
							<input type="submit" name="update_cart" value="Update Cart" />
							<input type="submit" name="continue" value="Continue Shopping" />
							<button><a href="checkout.php">Checkout</a></button>
						</div>
						
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
