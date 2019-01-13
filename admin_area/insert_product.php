<!DOCTYPE>
<?php
	include("includes/db.php");
	include("../functions/functions.php");
?>

<html>
	<head>
		<title>Add New Products</title>
	</head>
	<body>
		<div id="product_form">
			
			<form action="insert_product.php" method="post" enctype="multipart/form-data">
				<h2>New Product</h2><br>
				<div class="product_input">
					Product Title: <input type="text" name="product_title" />
				</div>
				<div class="product_input">
					Product Category: 
					<select name="product_category">
						<?php
							getCategoriesSelect();
						?>
					</select>
				</div>
				<div class="product_input">
					Product Brand:
					<select name="product_brand">
						<?php
							getBrandSelect();
						?>
					</select>
				</div>
				<div class="product_input">
					Product Image: <input type="file" name="product_image" />
				</div>
				<div class="product_input">
					Product Price: <input type="text" name="product_price" />
				</div>
				<div class="product_input">
					Product Description: <textarea name="product_description" cols="20" rows="20"> </textarea>
				</div>
				<div class="product_input">
					Product Keywords: <input type="text" name="product_keywords">
				</div>
				<input type="submit" name="OK" value="Add Product"/>
			</form>

			<?php			
				if (isset($_POST['OK'])) {
					$product_title = $_POST['product_title'];
					$product_cat = $_POST['product_category'];
					$product_brand = $_POST['product_brand'];
					$product_price = $_POST['product_price'];
					$product_desc = $_POST['product_description'];
					$product_keywords = $_POST['product_keywords'];
					
					$product_image = $_FILES['product_image']['name'];
					$product_image_tmp = $_FILES['product_image']['tmp_name'];

					move_uploaded_file($product_image_tmp, "product_images/$product_image");

					$insert_product = "insert into products (prod_cat, prod_brand, prod_title, prod_price, prod_desc, prod_img, prod_keywords) values ('$product_cat', '$product_brand', '$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
					
					if(($insert = mysqli_query($con, $insert_product))) {
						echo "<script>alert('Product Sucessfully Added!')</script>";
						echo "<script>window.open('insert_product.php', '_self')</script>";
					}
				}
			?>
		</div>
	</body>
</html>
