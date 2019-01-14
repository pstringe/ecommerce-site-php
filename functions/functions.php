<?php
	$con = mysqli_connect('127.0.0.1:8889', 'root', 'root', 'ecommerce') or die("Connection Failed");

	//dynamically retrieve categories for sidebar
	function getCategories()
	{
		global $con;
			
		//echo var_dump($con);
		$get_cats = "select * from categories";
		$run_cats = mysqli_query($con, $get_cats);
		while ($row = mysqli_fetch_array($run_cats)){
			$id = $row['cat_id'];
			$title =$row['cat_title'];

			echo "<div class='category_link'><a href='index.php?cat=$id'>$title</a></div>";
		}
	}

	
	//dynamically retrieve brands for sidebar 
	function getBrands()
	{
		global $con;
			
		//echo var_dump($con);
		$get_brands = "select * from brands";
		$run_brands = mysqli_query($con, $get_brands);
		while ($row = mysqli_fetch_array($run_brands)){
			$id = $row['brand_id'];
			$title =$row['brand_title'];

			echo "<div class='brand_link'><a href='index.php?brand=$id'>$title</a></div>";
		}
	}

	//dynamically retrieve brand names for selection
	function getBrandSelect()
	{
		global $con;
			
		$get_brands = "select * from brands";
		$run_brands = mysqli_query($con, $get_brands);
		while ($row = mysqli_fetch_array($run_brands)){
			$id = $row['brand_id'];
			$title = $row['brand_title'];

			echo "<option value='$id'>$title</option>";
		}
	}

	//dynamically retrieve category names for selection
	function getCategoriesSelect()
	{
		global $con;
			
		//echo var_dump($con);
		$get_cats = "select * from categories";
		$run_cats = mysqli_query($con, $get_cats);
		while ($row = mysqli_fetch_array($run_cats)){
			$id = $row['cat_id'];
			$title =$row['cat_title'];

			echo "<option value='$id'>$title</option>";
		}
	}

	//retrieve products from db
	function getProducts()
	{
		global $con;
		if (!isset($_GET['cat'])){
			if (!isset($_GET['brand'])) {
				$get_products = "select * from products order by RAND() LIMIT 0, 6";
				$run_products = mysqli_query($con, $get_products);

				while($row = mysqli_fetch_array($run_products)) {
					$prod_id = $row['prod_id'];
					$prod_cat = $row['prod_cat'];
					$prod_brand = $row['prod_brand'];
					$prod_price = $row['prod_price'];
					$prod_image = $row['prod_img'];

				echo "
					<div class='single_product'>
						<h3>$prod_title</h3>
						<img src='admin_area/product_images/$prod_image'>	
						<h2>$prod_price</h2>
						<a href='details.php?pro_id=$prod_id' style='float:left;'>Details</a>
						<a href='index.php?add_cart=$prod_id'><button>Add to Cart</button></a>
					</div>
					";
				}
			}
		}
	}

	//retrieve products from db
	function getProductsByCategory()
	{
		global $con;
		if (isset($_GET['cat'])){
			$cat_id = $_GET['cat'];
			$get_products = "select * from products where prod_cat='$cat_id'";
			$run_products = mysqli_query($con, $get_products);
			$count = mysqli_num_rows($run_products);
			
			if ($count == 0)
				echo "<h2>No Products in this category</h2>";
			
			while($row = mysqli_fetch_array($run_products)) {
				$prod_id = $row['prod_id'];
				$prod_cat = $row['prod_cat'];
				$prod_brand = $row['prod_brand'];
				$prod_price = $row['prod_price'];
				$prod_image = $row['prod_img'];

			echo "
				<div class='single_product'>
					<h3>$prod_title</h3>
					<img src='admin_area/product_images/$prod_image'>	
					<h2>$prod_price</h2>
					<a href='details.php?pro_id=$prod_id' style='float:left;'>Details</a>
					<a href='index.php?add_cart=$prod_id'><button>Add to Cart</button></a>
				</div>
				";
			}
		}
	}
	
	//retrieve products from db
	function getProductsByBrand()
	{
		global $con;
		if (isset($_GET['brand'])) {
			$brand_id = $_GET['brand'];
			$get_products = "select * from products where prod_brand='$brand_id'";
			$run_products = mysqli_query($con, $get_products);
			$count = mysqli_num_rows($run_products);

			if ($count == 0)
				echo "<h2>No Products for this brand</h2>";
	
			while($row = mysqli_fetch_array($run_products)) {
				$prod_id = $row['prod_id'];
				$prod_cat = $row['prod_cat'];
				$prod_brand = $row['prod_brand'];
				$prod_price = $row['prod_price'];
				$prod_image = $row['prod_img'];

				echo "
				<div class='single_product'>
					<h3>$prod_title</h3>
					<img src='admin_area/product_images/$prod_image'>	
					<h2>$prod_price</h2>
					<a href='details.php?pro_id=$prod_id' style='float:left;'>Details</a>
					<a href='index.php?add_cart=$prod_id'><button>Add to Cart</button></a>
				</div>
				";
			}
		}
	}
	
	//Retrieve product details for details page
	function getDetails()
	{
		global $con;

		$product_id = $_GET['pro_id'];
		$get_products = "select * from products where prod_id='$product_id'";
		$run_products = mysqli_query($con, $get_products);

		while($row = mysqli_fetch_array($run_products)) {
			$prod_cat = $row['prod_cat'];
			$prod_brand = $row['prod_brand'];
			$prod_title = $row['prod_title'];
			$prod_price = $row['prod_price'];
			$prod_image = $row['prod_img'];
			$prod_desc = $row['prod_desc'];
		echo "
			<div class='product_detail'>
				<h3>$prod_title</h3>
				<img src='admin_area/product_images/$prod_image'>	
				<h2>$prod_price</h2>
				<p>$prod_desc</p>
				<a href='index.php'>Go Back</a>
				<a href='index.php?add_cart='$product_id'><button>Add to Cart</button></a>
			</div>
		";
		}
	}

	function getIp() {
		$ip = $_SERVER['REMOTE_ADDR'];
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} 
		else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}

		return $ip;
	}

	function cart()
	{
		if (isset($_GET['add_cart']))
		{
			global $con;

			$id = $_GET['add_cart'];
			$ip = getIP();
			$check = "select * from cart where (ip_add='$ip' AND p_id='$id')";
			$run = mysqli_query($con, $check);
			
			if (!($n = mysqli_num_rows($run))){
				$insert = "insert into cart (p_id, ip_add) values ('$id', '$ip')";
				$run = mysqli_query($con, $insert);
				echo "<script>window.open('index.php', '_self')</script>";
			}
		}
	}

	function getTotalCartItems()
	{
		global $con;

		$ip = getIp();
		$get = "select * from cart where ip_add='$ip'";
		$run = mysqli_query($con, $get);
		$count = mysqli_num_rows ($run);

		echo $count;
	}

	function getTotalCartPrice()
	{
		global $con;
		
		$ip = getIp();
		$price_q = "select * from cart where ip_add='$ip'";
		$price_r = mysqli_query($con, $price_q);
		$total = 0;

		while ($p_price = mysqli_fetch_array($price_r)){
			$prod_id = $p_price['p_id'];
			$prod_price_q = "select * from products where prod_id='$prod_id'";
			$prod_price_r = mysqli_query($con, $prod_price_q);
			while ($r = mysqli_fetch_array($prod_price_r)){
				//echo var_dump($r);
				$total += $r['prod_price'];
			}
		}
		echo $total;
	}

	function getCartProducts()
	{
		global $con;
		
		$ip = getIp();
		$price_q = "select * from cart where ip_add='$ip'";
		$price_r = mysqli_query($con, $price_q);
		$total = 0;

		while ($p_price = mysqli_fetch_array($price_r)){
			$prod_id = $p_price['p_id'];
			$prod_price_q = "select * from products where prod_id='$prod_id'";
			$prod_price_r = mysqli_query($con, $prod_price_q);
			while ($r = mysqli_fetch_array($prod_price_r)){
				$title = $r['prod_title'];
				$price = $r['prod_price'];
				$img = $r['img'];
				$total += $r['prod_price'];
				
				echo ("
						<div class='cart-item'>
							<input type='checkbox' name='remove[]' value='$prod_id'>Product Title: $title <img src='admin_area/product_images/$img'>Product Price: $price <input type='text' name='qty'/>
						</div>
					");
			}
		}
		
		echo "Total: " . $total;
	}

	function updateCart()
	{
		global $con;

		$ip = getIp();
		if (isset($_POST['update_cart'])){
			foreach($_POST['remove'] as $remove_id){
				$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";
				$run_delete = mysqli_query($con, $delete_product);
				if($run_delete)
					echo "<script> winow.open('cart.php', '_self')</script>"; 
			}
		}
	}
?>
