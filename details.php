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
					<div class="menu_link"><a href="#">Home</a></div>
					<div class="menu_link"><a href="#">Products</a></div>
					<div class="menu_link"><a href="#">My Account</a></div>
					<div class="menu_link"><a href="#">Sign-Up</a></div>
					<div class="menu_link"><a href="#">Cart</a></div>
					<div class="menu_link"><a href="#">Contact</a></div>
				</div>
				<div id="search_form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search"/>
						<input type="submit" name="search" value="Search" />
					</form>
				</div>
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
				<div id="shopping_cart">
					<div>Welcome Guest</div>
					<div>Total Items:</div>
					<div>Total Price:</div>
					<div><a href="#">Go To Cart</a></div>
				</div>
				<div id="product container">
					<?php
						if (isset($_GET['pro_id']))
							getDetails();
						else
							getProducts();
					?>	
				</div>
			</div>
			<div class="footer">
			</div>
		</div>
	</body>
</html>
